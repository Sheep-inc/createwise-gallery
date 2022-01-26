
document.querySelectorAll("del-gallery").forEach((item, i) => {
  item.addEventListener("click",e=>{
    doRequest("/wp-admin/admin-ajax.php?action=cw_deleteGalleries&id="+e.target.dataset.id)
    doToast("galerij verwijderd")
    e.target.closest("tr").remove()
  })
});

async function doRequest(url){
  return await fetch(url,{
    method:"GET",
    credentials: "same-origin",
    headers: {
        'Accept': 'application/json',
    }
  }).then(res=>res.json())
}
