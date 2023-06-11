
function SearchInMain() {
  let origin = document.getElementById('origin').value;
  let destination = document.getElementById('destination').value;
  let tripdate = document.getElementById('tripdate').value;
  let triptime = document.getElementById('triptime').value;

  let url ;
  // Construct the URL with the values as query parameters
   url = '/Transportation/main/mainsearch.php?origin=' + encodeURIComponent(origin) + '&destination=' + encodeURIComponent(destination);
  
   if(tripdate && triptime)
   {
    url+='&tripdate=' + encodeURIComponent(tripdate) + '&triptime=' + encodeURIComponent(triptime);
   }
   else if(tripdate)
   {
    url+='&tripdate=' + encodeURIComponent(tripdate)
   }
   else if(triptime)
   {
    url+='&triptime=' + encodeURIComponent(triptime)
   }
  // Redirect to the other page
  window.location.href = url;
}


const IndexSearch = document.querySelector(".IndexSearch");

IndexSearch.addEventListener('click',()=>{

  SearchInMain();
})

