# A PHP cli application built with Symfony/Console component

### Contains
- case-insensitive test evaluating occurrences of given needles (Mary, John) in user-provided text, returns 1 if count is equal, 0 if not
- user-provided json sorting script, ex. [{"title": "H&M T-Shirt White","price": 10.99,"inventory": 10},{"title": "Magento Enterprise License","price": 1999.99,"inventory": 9999},{"title": "iPad 4 Mini","price": 500.01,"inventory": 2},{"title": "iPad Pro","price": 990.20,"inventory": 2},{"title": "Garmin Fenix 5","price": 789.67,"inventory": 34},{    "title": "iiPad Pro",    "price": 990.20,    "inventory": 2    },{"title": "Garmin Fenix 3 HR Sapphire Performer Bundle","price": 789.67,"inventory": 12}] 

### Requirements
- PHP >=7.0
- composer

### Usage
- clone repository
- run composer install
- run ./application.php app:sort-json [{...}] for json sort script
- run ./application.php app:evaluate-string ... for string evaluation script