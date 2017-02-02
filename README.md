## Laravel package that provides user balance and transactions functionality

### Now working only with Laravel > 5.3, for 5.2 will be created separet branch

### User balance = sum of transactions

### Installation

 - ```composer require cawakharkov/laravel-balance:dev-master```
 - add ```\CawaKharkov\LaravelBalance\LaravelBalanceServiceProvider::class``` to your config/app.php
 - add ```\CawaKharkov\LaravelBalance\Providers\TransactionsProvider::class,```(view composer) to your config/app.php
 - publish config ```php artisan vendor:publish```
 - run migrations ```php artisan migrate --path=database/migrations/laravel-balance```
 
 
### Configuration
  - **'prefix'** - route prefix for base transactions controller 
  - **'user'** - User class
  - **'layout'** -  layout that will be extended in views
  - **'list_view'** - list transaction view
  - **'compose'** - array of views where need to inject user transactions
  
### Usage
  - Add  ```\CawaKharkov\LaravelBalance\Interfaces\UserHasBalance``` interface to your user model
  - Add ```\CawaKharkov\LaravelBalance\Models\UserBalance``` trait to your user model
   or implement transactions() and balance() methods by your own
  - Inject ```\CawaKharkov\LaravelBalance\Interfaces\TransactionRepositoryInterface``` in controller to have access to transaction repository.
  
   ```
   
       protected $transactions;
     
         /**
          * TransactionController constructor.
          * @param TransactionRepositoryInterface $repo
          */
         public function __construct(TransactionRepositoryInterface $repo)
         {
             $this->transactions = $repo;
         }
   ```    
   
     
  - If you want to want to echo user transactions, just add view to composer section of config, 
   and view composer will inject $transaction variable  
   
