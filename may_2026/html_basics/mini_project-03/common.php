<?php
    function hasUpperCase($string) {
        if (preg_match('/[A-Z]/', $string)) {
            return true;
        } else {
            return false;
        }
    }
    function hasLowerCase($string) {
        if (preg_match('/[a-z]/', $string)) {
            return true;
        } else {
            return false;
        }
    }
    function hasNumber($string) {
        if (preg_match('/[0-9]/', $string)) {
            return true;
        } else {
            return false;
        }
    }

    function hasSpecialCharacter($string) {
        if (preg_match('/[^a-zA-Z0-9]/', $string)) {
            return true;
        } else {
            return false;
        }
    }