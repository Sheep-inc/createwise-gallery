document.querySelectorAll(".name_p_space").forEach((x) => {
  x.addEventListener("click",openChooseModal)
});

async function openChooseModal(e){
  var modalContent=document.getElementById("modalContent");
  modalContent.dataset.id=e.target.dataset.id
  if(modalContent.childElementCount>0){
    //continue
  }else{
    await doRequest().then(data=>{
      var html=``;
      data.forEach((item, i) => {
        console.log(item)
        html+=`<div class="card gal-img" style="width: 18rem;" data-id="${item.uploadid}">
          <img class="card-img-top" src="${item.link}" alt="${item.Naam}">
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
document.getElementById("modalContent").addEventListener("click",(e)=>{
  var target= e.target;
  if(target.matches(".gal-img")){
    addToForm(target)
  }else if (closest=target.closest(".gal-img")) {
    addToForm(closest)
  }
})

function addToForm(elemImg){
  var content= document.getElementById("modalContent");
  var upload= elemImg.dataset.id;
  var naam = elemImg.querySelector(".card-title").innerText;
  document.querySelector(".name_p_space[data-id='"+content.dataset.id+"']").innerText=naam+" is gekozen";
  document.querySelector("[name='foto_"+content.dataset.id+"']").value=upload;
  document.querySelector("[data-dismiss='modal']").click();
}

document.querySelectorAll("[data-dismiss='modal']").forEach(x => {
  x.addEventListener("click",e=>{
    var modal=document.getElementById("image-modal");
    modal.style.display=""
    modal.classList.remove("show")
  })
});

document.getElementById("createSpace").addEventListener("submit",e=>{
  e.preventDefault()
  var target = e.target;
  if(!target.checkValidity()){
    return;
  }
  var data = new FormData();
  var foto="";
  target.querySelectorAll("input,textarea").forEach((x, i) => {
    if(x.name.startsWith("foto_")){
      // if(x.value!=""){
        foto=foto+x.value+",";
      // }
    }else if (x.type=="checkbox") {
      data.append(x.name,x.checked);
    }else{
      if(x.name){
        data.append(x.name,x.value);
      }
    }
  });
  foto=foto.substr(0,foto.length-1)
  data.append("fotos",foto);
  fetch("/wp-admin/admin-ajax.php?action=cw_editGalleries", {
    method: 'POST',
    body: data
  })
  .then(response => response.json())
  .then(result => {
    console.log('Success:', result);
    doToast(result.message)
  })
})
