<?php
/**
 * @package         Shawn.Module
 * @subpackage      mod_esweather

 * @copyright       Copyright (C) 2012 Shawn.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class ModEsweatherHelper
{
    public static function getcwaData()
    {
        $url = "https://opendata.cwa.gov.tw/fileapi/v1/opendataapi/F-C0032-001?Authorization=rdec-key-123-45678-011121314&format=JSON&locationName=新北市&elementName=Wx";
        $response = file_get_contents($url);

        if ($response === FALSE) {
            die("無法取得資料");
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            die("JSON 解析錯誤: " . json_last_error_msg());
        }

        foreach ($data['cwaopendata']['dataset']['location'] as $location) {
            if ($location['locationName'] === '新北市') {
                $firstCI = $location['weatherElement'][0]['time'][1];
                $firstMaxT = $location['weatherElement'][1]['time'][1];
                $firstMinT = $location['weatherElement'][2]['time'][1];

                return [
                    'ci' => $firstCI['parameter']['parameterName'],
                    'maxT' => $firstMaxT['parameter']['parameterName'],
                    'minT' => $firstMinT['parameter']['parameterName'],
                    'unit' => $firstMinT['parameter']['parameterUnit'],
                    'endTime' => $firstCI['endTime'] ?? 'N/A'
                ];
            }
        }

        return null;
    }

    public static function getpm25Data()
    {
        $url_pm = "https://data.moenv.gov.tw/api/v2/aqx_p_432?api_key=e8dd42e6-9b8b-43f8-991e-b3dee723a52d";
        $response_pm = file_get_contents($url_pm);

        if ($response_pm === FALSE) {
            die("無法取得pm2.5資料");
        }

        $data_pm = json_decode($response_pm, true);

        //if (json_last_error() !== JSON_ERROR_NONE) {
        //    die("JSON 解析錯誤: " . json_last_error_msg());
        //}

        foreach ($data_pm['records'] as $record) {
            if ($record['sitename'] === '土城') {
                return $record;
            }
        }

        return null;
    }
}