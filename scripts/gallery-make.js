document.querySelectorAll(".name_p_space").forEach((x) => {
  x,addEventListener("click",openChooseModal)
});

async function openChooseModal(){
  var modalContent=document.getElementById("modalContent");
  if(modalContent.children>0){
    //continue
  }else{
    await doRequest().then(data=>{

      var html=``;
      data.forEach((item, i) => {
        console.log(item)
        html+=`<div class="card" style="width: 18rem;">
          <img class="card-img-top" src="${item.filepath}" alt="${item.Naam}">
          <div class="card-body">
            <h5 class="card-title">${item.Naam}</h5>
          </div>
        </div>`;
      });
      modalContent.innerHTML=html;
    })
  }
  var modal=document.getElementById("image-modal");
  modal.classList.add("show")
  modal.style.display="block";
}
var url="/wp-admin/admin-ajax.php?action=GetUserImages"
async function doRequest(){
  return await fetch(url,{
    method:"GET",
    credentials: "same-origin",
    headers: {
        'Accept': 'application/json',
    }
  }).then(res=>res.json())
}
