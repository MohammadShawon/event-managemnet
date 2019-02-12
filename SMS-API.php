<?php
//--------------- send SMS
			$fields_string ='';
            $url = 'http://powersms.banglaphone.net.bd/httpapi/sendsms';
            $fields = array(
                'userId' => urlencode('firoz'),
                'password' => urlencode('Firoz123'),
                'smsText' => urlencode('Your Event Jobs BD account verification Code. Thanks!!'),
                'commaSeperatedReceiverNumbers' => '8801913251272'
            );

            foreach ($fields as $key => $value) {
                $fields_string .= $key . '=' . $value . '&';
            }

            rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $result = curl_exec($ch);

            curl_close($ch);
            //--------------------