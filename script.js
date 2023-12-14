let cartItems = [];
let order = "";
const menu = [
    { id: 1, name: "Samosa", price: 10, img: "samosa.jpg" },
    { id: 2, name: "Pizza", price: 100, img: "pizza.jpg" },
    { id: 3, name: "Sandwhich", price: 50, img: "sandwhich.jpg" },
    { id: 4, name: "Tea", price: 59, img: "tea.jpg" },
    { id: 5, name: "Hotdog", price: 19, img: "hotdog.jpg" },
    { id: 6, name: "Coca Cola", price: 69, img: "cola.jpg" },
    { id: 7, name: "French Fries", price: 179, img: "fry.jpg" },
    { id: 8, name: "Bread Pakoda", price: 499, img: "breadpakoda.jpg" },
    { id: 9, name: "Shake", price: 399, img: "shake.jpg" },
    { id: 10, name: "Donut", price: 449, img: "donut.jpg" },
];

document.addEventListener("DOMContentLoaded", function () {
    const menuContainer = document.getElementById("menu-container");

    menu.forEach(item => {
        const menuItem = document.createElement("section");
        menuItem.className = "menu-item";
        menuItem.setAttribute("data-item-id", item.id);

        menuItem.innerHTML = `
            <img src="${item.img}" alt="${item.name}">
            <h2>${item.name}</h2>
            <p>Delicious ${item.name} description.</p>
            <span class="price">Rs.${item.price.toFixed(2)}</span>
            <button class="add-to-cart-btn" onclick="addToCart(${item.id})">Add to Cart</button>
        `;

        menuContainer.appendChild(menuItem);
    });
});

function addToCart(itemId) {
    const menuItem = menu.find(item => item.id === itemId);

    if (menuItem) {
        cartItems.push(menuItem);
        updateCart();
    } else {
        alert("Item not found in the menu.");
    }
}

function updateCart() {
    const cartList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    cartList.innerHTML = "";
    let total = 0;

    cartItems.forEach(item => {
        const listItem = document.createElement("li");
        listItem.textContent = `${item.name} - Rs.${item.price.toFixed(2)}`;
        cartList.appendChild(listItem);

        total += item.price;
    });

    cartTotal.textContent = total.toFixed(2);
}

function checkout() {
    if (cartItems.length === 0) {
        alert("Your cart is empty. Add items before checkout.");
    } else {
        // Set values of hidden form inputs before submitting
        document.getElementById("amountInput").value = getval();
        document.getElementById("orderInput").value = getval2();

        // Submit the form
        document.getElementById("frm_kushal").submit();
    }
}

function getval() {
    var total = 0;

    cartItems.forEach(item => {
        // Apply a 10% discount for gold members
        var itemPrice = item.price;
        /*if (isGoldMember()) {
            itemPrice *= 0.9; // 10% discount for gold members
        }*/

        total += itemPrice;
    });

    return total.toFixed(2);
}

function getval2(){
    var order = "";
    cartItems.forEach(item => {

        order += item.name + " ";
    });
return order;
}




