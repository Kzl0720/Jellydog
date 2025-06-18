const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [
  {
    id: 1,
    title: "Messenger Bunny",
    price: 129,
    img: "./img/Product/product 1 messengerbunny.png",
    sizes: ["10CM", "30CM", "60CM"] 
  },
  {
    id: 2,
    title: "Timmy Turtle",
    price: 139,
    img: "./img/Product/product 2 timmyturtle.png",
    sizes: ["10CM", "25CM", "50CM"]
  },
  {
    id: 3,
    title: "Ricky Rain Frog",
    price: 99,
    img: "./img/Product/product 3 rickyrainfrog.png",
    sizes: ["15CM", "30CM","50CM"]
  },
  {
    id: 4,
    title: "Derreck Dog",
    price: 159,
    img: "./img/Product/product 4 derreckdog.png",
    sizes: ["10CM", "30CM", "55CM"]
  },
  {
    id: 5,
    title: "Amuseables sandcastle",
    price: 199,
    img: "./img/Product/product 5 amuseablessanscastle.png",
    sizes: ["20CM", "30CM","45CM"]
  },
];

let choosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductSizes = document.querySelectorAll(".size");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    // Change the current slide
    wrapper.style.transform = `translateX(${-100 * index}vw)`;

    // Change the chosen product
    choosenProduct = products[index];

    // Update texts for the current product
    currentProductTitle.textContent = choosenProduct.title;
    currentProductPrice.textContent = "RM" + choosenProduct.price;
    currentProductImg.src = choosenProduct.img;

    // Update sizes for the current product
    // First, reset all size buttons
    currentProductSizes.forEach((size, idx) => {
      size.textContent = choosenProduct.sizes[idx]; // Update size text
      size.style.backgroundColor = "white"; // Reset background
      size.style.color = "black"; // Reset color
    });
  });
});

// Handle size selection
currentProductSizes.forEach((size, index) => {
  size.addEventListener("click", () => {
    // Reset all sizes styles
    currentProductSizes.forEach((s) => {
      s.style.backgroundColor = "white";
      s.style.color = "black";
    });

    // Set the selected size styles
    size.style.backgroundColor = "black";
    size.style.color = "white";

    // You can save the selected size here if needed
    choosenProduct.selectedSize = choosenProduct.sizes[index];
  });
});

// Handle payment modal visibility
const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");

productButton.addEventListener("click", () => {
  payment.style.display = "flex";
});

close.addEventListener("click", () => {
  payment.style.display = "none";
});
