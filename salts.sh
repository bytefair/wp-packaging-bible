#!/bin/sh
SALTS=$(curl https://api.wordpress.org/secret-key/1.1/salt/)
echo '<?php' $SALTS >> config/salts.php
