
function SearchInMain() {
  let origin = document.getElementById('origin').value;
  let destination = document.getElementById('destination').value;

  // Construct the URL with the values as query parameters
  let url = '/Transportation/main/mainsearch.php?origin=' + encodeURIComponent(origin) + '&destination=' + encodeURIComponent(destination);

  // Redirect to the other page
  window.location.href = url;
}


const IndexSearch = document.querySelector(".IndexSearch");

IndexSearch.addEventListener('click',()=>{

  SearchInMain();
})

