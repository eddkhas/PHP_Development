<?php

    //---- DB CONNECTION ----//
            
        $configDb = $config[ 'DataBase' ];
        $db = new PDO( 
            "{$configDb[ 'dbms' ]}:host={$configDb[ 'host' ]};dbname={$configDb[ 'dbname' ]}", 
            $configDb[ 'user' ], 
            $configDb[ 'pass' ] 
        );

    //-----------------------//
            
    //---- DB CACHE SYSTEM CONFIG ----//
        $cacheConf = $config[ 'CacheConfig' ];
        
        /*
        $cacheManager = new CacheManager_Db( array(
            'expTime' => $cacheConf[ 'expTime' ],
            'pdoInstance' => $db,
            'tableName' => $cacheConf[ 'db_table' ]
        ) );
        */
        
        $cacheManager = CacheManager_Factory::getCacheManager( array(
            'type' => 'DB',
            'consArgs' => array( 
                'expTime' => $cacheConf[ 'expTime' ],
                'pdoInstance' => $db,
                'tableName' => $cacheConf[ 'db_table' ] 
            )
        ) );
        
    //---------------------------------//
    
    //---- INCLUDE TEST ----//
        include TESTS_PATH . 'cacheTest.php';
    //----------------------//
        
    //---- VIEW CONFIG ----//
        $type = 'DB';
        $viewPath = VIEWS_PATH . 'fileView.php';
    //---------------------//