<?php

    function __construct($licence = "")
    {
        $this->licence = $licence;
        if ($this->isValidLicence($this->licence)) {
            $this->validLicence = true;
        }
    }

    function isValidLicence($licence)
    {
        $a_licence = $this->decodeLicence($licence);
        if (false !== $a_licence) {
            $licenced_site = str_replace(array("http:", "https:", "//", "www."), array("", "", "", ""), $a_licence["site"]);
            $this_site = $this->get_sitename(HTTPS_SERVER);
            if ($this_site != $licenced_site) {
                return false;
            }
            return true;
        }
        if ($this->isValidTempLicence($licence)) {
            return true;
        }
        return false;
    }
    function isValidTempLicence($licence)
    {
        $a_licence = $this->decodeTempLicence($licence);
        if (false !== $a_licence) {
            $delta_t_allowable = $a_licence["days"] * 60 * 60 * 24;
            $delta_t_real = time() - $a_licence["time"];
            if ($delta_t_allowable < $delta_t_real) {
                return false;
            }
            $licenced_site = str_replace(array("http:", "https:", "//", "www."), array("", "", "", ""), $a_licence["site"]);
            $this_site = $this->get_sitename(HTTPS_SERVER);
            if ($this_site != $licenced_site) {
                return false;
            }
            return true;
        }
        return false;
    }
    function decodeLicence($licence)
    {
        $res = array();
        $real_licence_code = base64_decode($licence);
        preg_match("/2MNmezM50zJNQw(.*)YmFlGY2YMzcymIwM/siU", $real_licence_code, $matches);
        if ($matches) {
            $res["site"] = base64_decode(base64_decode(base64_decode($matches[1])));
            unset($matches);
            preg_match("/Yj1GExdmMQx9x3Yz(.*)wYzEwY2UzJl/siU", $real_licence_code, $matches);
            if ($matches) {
                $res["time"] = base64_decode($matches[1]);
                unset($matches);
                if (count($res) < 2) {
                    return false;
                }
                return $res;
            }
            return false;
        }
        return false;
    }
    function decodeTempLicence($licence)
    {
        $res = array();
        $real_licence_code = base64_decode($licence);
        preg_match("/JYzYmdcyc(.*)4yN3YjRhjYzc/siU", $real_licence_code, $matches);
        if ($matches) {
            $res["site"] = base64_decode($matches[1]);
            unset($matches);
            preg_match("/BwjYzc3YThiZ(.*)E2kNxNzFYzDAw/siU", $real_licence_code, $matches);
            if ($matches) {
                $res["time"] = base64_decode(base64_decode($matches[1]));
                unset($matches);
                preg_match("/A4zk2YZjNzA4Y(.*)ENTNmF1Mmj0Nzkw/siU", $real_licence_code, $matches);
                if ($matches) {
                    $res["days"] = base64_decode($matches[1]);
                    unset($matches);
                    if (count($res) < 3) {
                        return false;
                    }
                    return $res;
                }
                return false;
            }
            return false;
        }
        return false;
    }