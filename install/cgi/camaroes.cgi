#!/bin/bash


chown -v www-data:www-data ../camaroes/config.inc.php
chown -v www-data:www-data ../camaroes/conf.php
chown -v www-data:www-data ../camaroes/page.php
chown -v www-data:www-data ../camaroes/themes.php

chown -Rv www-data:www-data ../camaroes/home/
chown -Rv www-data:www-data ../camaroes/tab/
chown -Rv www-data:www-data ../camaroes/languages/
chown -Rv www-data:www-data ../camaroes/conf.d/
chown -Rv www-data:www-data ../camaroes/themes/
chown -Rv www-data:www-data ../camaroes/log/
chown -Rv www-data:www-data ../camaroes/temp/


chmod -c ug+rw ../camaroes/config.inc.php
chmod -c ug+rw ../camaroes/conf.php
chmod -c ug+rw ../camaroes/page.php
chmod -c ug+rw ../camaroes/themes.php

chmod -cR ug+rw ../camaroes/home/
chmod -cR ug+rw ../camaroes/tab/
chmod -cR ug+rw ../camaroes/languages/
chmod -cR ug+rw ../camaroes/conf.d/
chmod -cR ug+rw ../camaroes/themes/
chmod -cR ug+rw ../camaroes/log/
chmod -cR ug+rw ../camaroes/temp/
