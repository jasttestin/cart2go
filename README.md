# cart2go
This is a simple cart system made for PHP that will allow you to save item IDs to add to your cart. Saving prices is risky and should always be checked in the back-end.

## Installation

Use composer to install cart2go. 

```php
composer require noahenrik/cart2go
```

## Usage

Import the namespace with class:
```php
$cart = new \Cart\Cart();
```

### Add items to cart:
The `addItemToCart` method takes 2 paramaters, itemId and $amount. **Amount is an optional paramater**.

If the user clicks on an item that's already in the cart, the amount will automatically be incremented by 1.

If you specify an amount, the existing amount will be updated to the amount given not not incremented.

```php
$cart->addItemToCart($itemId, $amount);

//OR

$cart->addItemToCart($itemId);

```
### Grab all items currently in the cart:
This method will grab all the items currently in the cart.
```php
$allCartItems = $cart->grabAllItems();
```
#### Example
```php
$allCartItems = $cart->grabAllItems();

foreach ($allCartItem as $key => $cartItem) {
  
  echo "Amount: " . $allCartItem[$key]['amount'] . " ItemId: " . $allCartItem[$key]['itemId'];
}    
```

### Reset a cart:
This will remove all items within the cart.

```php
$cart->reset();
```

### Grab single item:
This will grab only the selected item from the cart.

```php
$cart->grabItem($itemId);
```


## License
[MIT](https://choosealicense.com/licenses/mit/)
