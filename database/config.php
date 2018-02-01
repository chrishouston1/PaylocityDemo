<?php
    
    $localhost_cleardb_url = "mysql://bc102203d9317b:e84a9e31@us-cdbr-iron-east-05.cleardb.net/heroku_cd2cb106db1e7ce?reconnect=true";
    if(!getenv("CLEARDB_DATABASE_URL")) {
        PUTENV("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
        
    }