<?php

/**
 * ToolBox is a PHP class featuring miscellaneous useful functions.
 * 
 * This software is liscensed under the MIT License. 
 * More info available at https://github.com/PHLAK/ToolBox
 * 
 * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
 * @copyright 2011 Chris Kankiewicz
 */
class PHLAKNET_ToolBox {
    
    /**
     * Generate a random string of characters with a specified length and complexity.
     * 
     * @param int $length Length of desired salt
     * @param bool $strict If true, no character will be repeated
     * @param string|array $charset A string of characters to be used in generating the salt or an
     *                              array of pre-defined sets (lower, upper, num, special, extra)
     * @return string String of specified length and complexity
     * @access public
     */
    public function makeSalt($length, $strict = false, $charset = NULL) {
        
        // Define possible characters
        if (is_string($charset)) {
            
            // Set the characterset to the user defined string
            $chars = $charset;
            
        } elseif (is_array($charset)) {
            
            // Create empty string
            $chars = NULL;

            // Lower case alpha characters
            if ( isset($charset['lower']) ) {
                $chars .= 'abcdefghijklmnopqrstuvwxyz';
            }
            
            // Upper case alpha characters
            if ( isset($charset['upper']) ) {
                $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            
            // All numbers
            if ( isset($charset['num']) ) {
                $chars .= '0123456789';
            }
            
            // Special characters
            if ( isset($charset['special']) ) {
                $chars .= '!@#$%^&*()-_=+.?';
            }
            
            // Uncommon extra characters
            if ( isset($charset['extra']) ) {
                $chars .= '{}[]<>:;/\|~';
            }
            
        } else {
            
            // All possible characters
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+.?{}[]<>:;/\|~';
            
        }
        
        // If strict is set and number of characters is less than desired length, die with error
        if ($strict == true && strlen($chars) < $length) {
            die("ERROR: Available character set is smaller than length.");
        }
        
        // Create empty string
        $salt = NULL;
        
        // Pick a random char and append it to $salt until string length == $length
        $i = 0;
        while ($i < $length) {
            
            // Pick a random character from the pool of available chars
            $char = substr($chars, mt_rand(0, strlen($chars)-1), 1);
            
            // Append the character to $salt if not already used
            if ($strict == true) {
                if (!strstr($salt, $char)) {
                    $salt = $salt.$char;
                    $i++;
                }
            } else {
                $salt = $salt.$char;
                $i++;
            }
            
        }
        
        // Return the salt
        return $salt;
        
    }
    
}


?>