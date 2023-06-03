const product = [
    {
        id:0,
        image: 'foto.jpg',
        title: 'Z flip Foldable Mobile',
        price: 120,
    },
    {
        id:1,
        image: 'im',
        title: 'Air Pods Pro',
        price: 60,
    },
    {
        id:2,
        image: 'im',
        title: '250D DSLR Camera',
        price: 230,
    },
    {
        id:3,
        image: 'im',
        title: 'Head Phones',
        price: 100,
    }
];
const categories = [...new Set(product.map((item)=>{return item}))]
let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>{
    const {image, title, price} = item;
    return(
        "<div class= 'box-cart'>"+
            "<div class='imgbox-cart'>"+
               " <img class='images' >"+
            "</div>"+
            "<div class='bottom'>"+
                "<p>${title}</p>"+
                "<h2>$ ${price}.00</h2> "+
                "<button onClick='addtocart("+(i++)+")'>Add to cart</button>"+
            "</div>" +
        "</div>"
    )
}).join('')
var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}

function delElement(a){
    cart.splice(a, 1);
    displaycart();
}
function displaycart(a){
    let j = 0;
    if(cart.lenght==0){
        document.getElementById('cartItem').innerHTML="Your cart is empty";
    }
    else{
        document.getElementById("cartItem").innerHTML=cart.map((items)=>
        {
            var {image, title, price} = items;
            return(
                "<div class='cart-item'>"+
                    "<div class='row-img'>"+
                        "<img class='rowing' >"+
                   " </div>"+
                    "<p style='font-size:12px;'>${title}</p>"+
                    "<h2 style='font-size: 15px;'>${price}.00</h2> "+
                   ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"' +
                         "className='bi bi-trash' viewBox='0 0 16 16' onClick='delElement(j++)'> "+
                       " <path"+
                           ' d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>'+
                        "<path"+
                            'd="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />'+
                   " </svg>"+
                "</div>"
            );
        }).join('')
    }
}
