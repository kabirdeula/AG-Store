const product_list = document.querySelector('.productList');
const cartContainer = document.querySelector('.cart-container');
const cartList = document.querySelector('.cart-list');
const cartTotalValue = document.getElementById('cart-total-value');
const cartCountInfo = document.getElementById('cart-count-info');
let cartItemID = 1;

eventListeners();

function eventListeners() {
    window.addEventListener('DOMContentLoaded', () => {
        loadProducts();
        loadCart();
    });
    // show/hide cart container
    document.getElementById('cart-btn').addEventListener('click', () => {
        cartContainer.classList.toggle('show-cart-container');
    });

    // add to cart
    productList.addEventListener('click', purchaseProduct);

    // delete from cart
    cartList.addEventListener('click', deleteProduct);
}

function updateCartInfo() {
    let cartInfo = findCartInfo();
    cartCountInfo.textContent = cartInfo.productCount;
    cartTotalValue.textContent = cartInfo.total;
}

async function loadProducts() {
    await fetch('product.json')
        .then(response => response.json())
        .then(data => {
            product_list.innerHTML = data.map((products, key) => {
                return `
                <div class="col-md-4 text-center fadeInUp"><div class="product">
                <div class="product-grid" style="background-image:url(${products.image});">
                <div class="inner">
                                    <p>
                                        <a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
                                        <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="single.html">${products.title}</a></h3>
                                <span class="price">Rs. ${products.price}</span>
                            </div>
                        </div>
                    </div>
                 `
            }).join('');
        })
}

// purchase product
function purchaseProduct(e) {
    if (e.target.classList.contains('add-to-cart-btn')) {
        let product = e.target.parentElement.parentElement;
        getProductInfo(product);
    }
}

// get product info after add to cart button click
function getProductInfo(product) {
    let productInfo = {
        id: cartItemID,
        imgSrc: product.querySelector('.product-img img').src,
        name: product.querySelector('.product-name').textContent,
        category: product.querySelector('.product-category').textContent,
        price: product.querySelector('.product-price').textContent
    }
    cartItemID++;
    addToCartList(productInfo);
    saveProductInStorage(productInfo);
}

// add the selected product to the cart list
function addToCartList(product) {
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.setAttribute('data-id', `${product.id}`);
    cartItem.innerHTML = `
        <img src = "${product.imgSrc}" alt = "product image">
        <div class = "cart-item-info">
            <h3 class = "cart-item-name">${product.name}</h3>
            <span class = "cart-item-category">${product.category}</span>
            <span class = "cart-item-price">${product.price}</span>
        </div>
        <button type = "button" class = "cart-item-del-btn">
            <i class = "fas fa-times"></i>
        </button>
    `;
    cartList.appendChild(cartItem);
}

// save the product in the local storage
function saveProductInStorage(item) {
    let products = getProductFromStorage();
    products.push(item);
    localStorage.setItem('products', JSON.stringify(products));
    updateCartInfo();
}

// get all the products info if there is any in the local storage
function getProductFromStorage() {
    return localStorage.getItem('products') ? JSON.parse(localStorage.getItem('products')) : [];
    // returns empty array if there isn't any product info
}

// load carts product
function loadCart() {
    let products = getProductFromStorage();
    if (products.length < 1) {
        cartItemID = 1; // if there is no any product in the local storage
    } else {
        cartItemID = products[products.length - 1].id;
        cartItemID++;
        // else get the id of the last product and increase it by 1
    }
    products.forEach(product => addToCartList(product));

    // calculate and update UI of cart info 
    updateCartInfo();
}

// calculate total price of the cart and other info
function findCartInfo() {
    let products = getProductFromStorage();
    let total = products.reduce((acc, product) => {
        let price = parseFloat(product.price.substr(1)); // removing dollar sign
        return acc += price;
    }, 0); // adding all the prices

    return {
        total: total.toFixed(2),
        productCount: products.length
    }
}

// delete product from cart list and local storage
function deleteProduct(e) {
    let cartItem;
    if (e.target.tagName === "BUTTON") {
        cartItem = e.target.parentElement;
        cartItem.remove(); // this removes from the DOM only
    } else if (e.target.tagName === "I") {
        cartItem = e.target.parentElement.parentElement;
        cartItem.remove(); // this removes from the DOM only
    }

    let products = getProductFromStorage();
    let updatedProducts = products.filter(product => {
        return product.id !== parseInt(cartItem.dataset.id);
    });
    localStorage.setItem('products', JSON.stringify(updatedProducts)); // updating the product list after the deletion
    updateCartInfo();
}