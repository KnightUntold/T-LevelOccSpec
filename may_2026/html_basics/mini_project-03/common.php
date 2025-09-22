<?php
    function hasUpperCase($string) {
        if (preg_match('/[A-Z]/', $string)) { //finds a match for any characters in the string for any capital letters between A-Z
            return true;
        } else {
            return false;
        }
    }
    function hasLowerCase($string) {
        if (preg_match('/[a-z]/', $string)) { //finds a match for any characters in the string for any lowercase letters between a-z
            return true;
        } else {
            return false;
        }
    }
    function hasNumber($string) {
        if (preg_match('/[0-9]/', $string)) { //finds a match for any characters in the string for numbers
            return true;
        } else {
            return false;
        }
    }

    function hasSpecialCharacter($string) {
        if (preg_match('/[^a-zA-Z0-9]/', $string)) { //finds a match for any characters in the string with any special characters
            return true;
        } else {
            return false;
        }
    }