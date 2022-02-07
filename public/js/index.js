//set counter for ticket amount
const place = document.getElementById('amount')
var count = 0
place.innerHTML = count
const handleIncrement = () => {
  count++
  place.innerHTML = count
}

const handleDecrement = () => {
  count--
  place.innerHTML = count
}

