const formElementAdd = document.querySelector(".form");
const messageForm = document.querySelector(".message");
 // извлекаем элемент формы
formElementAdd.addEventListener('submit', (e) => {
  // e.preventDefault() // Убрать если хочешь чтоб страница обновлялась
  const formElement = document.querySelector(".form"); 
  const formData = new FormData(formElement); // создаём объект FormData, передаём в него элемент формы
  // теперь можно извлечь данные
  const name = formData.get('firstname'); // 'John'
  const surname = formData.get('secondname'); // 'Smith'
  const email = formData.get('email'); // 'John'
  const password = formData.get('password'); // 'Smith'
  const confirmPassword = formData.get('confirmPassword');
  // if (password == confirmPassword) {
  //   // var arr = {
  //   //     "name": `${name}`,
  //   //     "surname": `${surname}`,
  //   //     "email": `${email}`,
  //   //     "password": `${password}`,
  //   //     "confirmPassword": `${confirmPassword}`
  //   //     // "name": "name",
  //   //     // "surname": "surname",
  //   //     // "email": "email",
  //   //     // "password": "password",
  //   //     // "confirmPassword": "confirmPassword"
  //   // };
  // }
  // else{
  //   messageForm.textContent = "Passwords don't match, please try again.";
  //   messageForm.style.color = "red";
  //   e.preventDefault()
  // }
});