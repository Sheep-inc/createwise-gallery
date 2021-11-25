class gallery{
    config={user:0,url:url};
    inputs={}
    wrapper;
    totalItems=0;
    totalPages=0;
    currentpage=0;
    settings={}
    constructor(elem, config){
        this.elem = elem
        this.config=Object.assign(this.config,this.config,config);
        this.config.user=elem.dataset.user??0;
        this.wrapper=elem;
        var search= elem.previousElementSibling;
        this.inputs["search"]=search.querySelector("#searchbar")
        this.inputs["orderSelec"]=search.querySelector("select[name='order']")
        this.pagination=elem.nextElementSibling
        var that = this;
        elem.previousElementSibling.addEventListener("change",()=>{
            this._updateGallery(that);
        })
        this._updateGallery(that);
        // _loadmore(1)
    }

    _buildCards(json){
        var html="";
        var cards= json.cards??json;
        cards.forEach(item=>{

          html+=`<div class="card galleryCard col-md-4 col-sm-12">
            <a href="/galeries/${item.ID}">
              ${item.Name}:<br>
              <img src="${item.url}" class="card-img-top" alt="${item.Name}">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="/users/${item.user}">${item.user}</a></h5>
              </div>
          </div>`

          //   html+=`<div class="card tcg" data-id='${item.ID}'>
          //   <a href="/galleries/?id=${item.ID}"><img class="card-img-top" src="${item.url}" alt="${item.Name}"></a>`;
          //   html+='<span class="sc-card-badge">'+item.views+'</span>';
          //   html+=`<div class="card-body">
          //     <p class="card-title text-center">${item.Name.replaceAll("\\","")}</p>
          //   </div>
          // </div>`;
        
        })
        html=html==""?"no galleries found":html
        return html;
    }
    async _loadmore(page=0){
        //wip add stuff
        this.settings.page=page;
        var data = new FormData();
        data.append("json",JSON.stringify(this.settings))
        var that = this;
        return fetch(url+"&user="+that.config.user, {
            method: 'POST',
            credentials: "same-origin",
            body:data,
            headers: {
                'Accept': 'application/json',
            }
        }).then(function(res){
            return res.json();
        }).then(function(json){
            if(json.length<24){
                that.loading=true;
                return;
            }
            that.totalItems= json.items
            var html = that._buildCards(json.cards)
            that.wrapper.innerHTML =html;
            that.loading=false;
            that._updatePagination(Number(page))
        })
    }

    _updateGallery(that){
        that.settings.search= that.inputs["search"].value;
        that.settings.ordertype=that.inputs["orderSelec"].options[that.inputs["orderSelec"].selectedIndex].value;
        that.settings.start=0;
        that._loadmore(1);
    }
    _updatePagination(page=1){
        var totalPages= Math.ceil(this.totalItems/12);
        // selecting required element
        let liTag = '';
        let active;
        const element = this.pagination
        let beforePage = page - 1;
        let afterPage = page + 1;
        if(page > 1){ //show the next button if the page value is greater than 1
            liTag += `<li class="btn prev" data-page="${page - 1}"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;
        }
        if(page > 2){ //if page value is less than 2 then add 1 after the previous button
            liTag += `<li class="first numb" data-page="1"><span>1</span></li>`;
            if(page > 3){ //if page value is greater than 3 then add this (...) after the first li or page
            liTag += `<li class="dots"><span>...</span></li>`;
            }
        }
        // how many pages or li show before the current li
        if (page == totalPages) {
            beforePage = beforePage - 2;
        } else if (page == totalPages - 1) {
            beforePage = beforePage - 1;
        }
        // how many pages or li show after the current li
        if (page == 1) {
            afterPage = afterPage + 2;
        } else if (page == 2) {
            afterPage  = afterPage + 1;
        }
        for (var plength = beforePage; plength <= afterPage; plength++) {
            if (plength > totalPages || plength<1) { //if plength is greater than totalPage length then continue
            continue;
            }
            if (plength == 0) { //if plength is 0 than add +1 in plength value
            plength = plength + 1;
            }
            if(page == plength){ //if page is equal to plength than assign active string in the active variable
            active = "active";
            }else{ //else leave empty to the active variable
            active = "";
            }
            liTag += `<li class="numb ${active}" data-page="${plength}"><span>${plength}</span></li>`;
        }
        if(page < totalPages - 1){ //if page value is less than totalPage value by -1 then show the last li or page
            if(page < totalPages - 2){ //if page value is less than totalPage value by -2 then add this (...) before the last li or page
            liTag += `<li class="dots"><span>...</span></li>`;
            }
            liTag += `<li class="last numb" data-page="${totalPages}"><span>${totalPages}</span></li>`;
        }
        if (page < totalPages) { //show the next button if the page value is less than totalPage(20)
            liTag += `<li class="btn next" data-page="${page + 1}"><span>Next <i class="fas fa-angle-right"></i></span></li>`;
        }
        element.children[0].innerHTML = liTag; //add li tag inside ul tag
        this.pagination.querySelectorAll("li").forEach(target=>{
            target.addEventListener("click",()=>{
                this._loadmore(target.dataset.page)
            })
        })
        return liTag;
    }
}


var galeries =[];
var url="/wp-admin/admin-ajax.php?action=cw_loadGalleries";

galeries.main=new gallery(document.getElementById("galleryHolder"));

// document.querySelector(".AdvancedOptionsToggle span").addEventListener("click",e=>{
//     $(".galleryOptions.row").slideToggle();
// })
