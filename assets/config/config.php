<?php

use Hanafalah\ModuleAnatomy\{
    Models,
    Schemas,
    Contracts,
    Commands
};

return [
    'namespace' => 'Hanafalah\\ModuleAnatomy',
    'app' => [
        'contracts' => [
            //ADD YOUR CONTRACTS HERE
        ]
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations'
    ],
    'database' => [
        'models' => [
        ]
    ],
    'commands'  => [
        Commands\InstallMakeCommand::class
    ],
];
