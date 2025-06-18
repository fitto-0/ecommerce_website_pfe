// start product_details page -> increase, decrease items 
var increaseBtn = document.getElementsByClassName('btn-increase');
var decreaseBtn = document.getElementsByClassName('btn-decrease');
var itemsToBuy = document.getElementById('num_of_items');

function increaseValueBtn() {
    let numero = Number(itemsToBuy.value) + 1;
    itemsToBuy.value = numero;
}

function decreaseValueBtn() {

    let numero = Number(itemsToBuy.value) - 1;
    numero = numero < 0 ? 0 : numero;
    itemsToBuy.value = numero;
}


// end product_details page -> increase, decrease items 


const contactForm = document.getElementById('contact-form'),
      contactMessage = document.getElementById('contact-message')

const sendEmail = (e) =>{
      e.preventDefault()
      
      // serviceID - templateID - #form - publicKey
      emailjs.sendForm('service_no6ymiw','template_rwq7far','#contact-form','bmRCaRjKITbmyytFw')
      .then(()=>{
        //Show Sent message
        contactMessage.textContent = 'Message Sent Successfully ✅'


        console.log('email', contactMessage.textContent);

        // Remove message after five seconds
        setTimeout(() =>{
          contactMessage.textContent = ''
        }, 5000)

          // Clear input fields
          contactForm.reset()

      }, () =>{
        // Show error message
        contactMessage.textContent = 'Message not sent (service error) ❌'

      })
}

contactForm.addEventListener('submit', sendEmail)




