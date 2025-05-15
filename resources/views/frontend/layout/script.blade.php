<div id="POPUP1">
    <div data-width="414" data-height="328">
        <div id="SHAPE53" class="event_scoll_action" style="cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 11.250000953674316 17.9976863861084">
                <foreignObject x="0" y="0" width="11.250000953674316" height="17.9976863861084"><i class=" far  fa-times" style="font-size: 18px; color: rgb(255, 255, 255); cursor: pointer;"></i></foreignObject>
            </svg>
        </div>
        <div id="TITLE132">
            <h3>ĐĂNG KÝ NHẬN ƯU ĐÃI NGAY</h3>
        </div>
        <div id="FORM3" data-type="lead">
            <form id="formRegisterUuDai" action="{{ route('frontend.customer.store') }}" method="post">
                @csrf
                <div id="INPUT12">
                    <input name="name" type="text" placeholder="Họ tên" required class="form-control">
                </div>
                <div id="INPUT13">
                    <input name="email" type="email" placeholder="Email" required class="form-control">
                </div>
                <div id="INPUT14">
                    <input name="phone" type="tel" placeholder="Số điện thoại" required class="form-control">
                </div>

                <div id="BUTTON15"><button type="submit"> <span>Đăng ký ngay</span> </button></div>
            </form>
            <div class="data_thankyou" style="display: none;">Cảm ơn bạn đã quan tâm!</div>
        </div>
    </div>
</div>

<button id="scrollToTop" type="button" class="btn btn-lg">
    <i class="fas fa-chevron-up" style="font-size: 17px; color: #084c7e;"></i>
</button>
<script src="{{ auto_version('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ auto_version('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/js/script.js') }}"></script>
{{-- <script>
    $('#formRegisterUuDai').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        form.find('input').removeClass('is-invalid');
        form.find('.invalid-feedback').text('');

        let name = form.find('input[name="name"]').val().trim();
        let email = form.find('input[name="email"]').val().trim();
        let phone = form.find('input[name="phone"]').val().trim();

        $.ajax({
            type: 'POST',
            url: '{{ route("frontend.customer.store") }}',
            data: {
                name: name,
                email: email,
                phone: phone,
                _token: '{{ csrf_token() }}'
            },
            success: function () {
                form.hide();
                $('.data_thankyou').show();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    if (errors.name) {
                        form.find('input[name="name"]').addClass('is-invalid');
                        form.find('input[name="name"]').siblings('.invalid-feedback').text(errors.name[0]);
                    }
                    if (errors.email) {
                        form.find('input[name="email"]').addClass('is-invalid');
                        form.find('input[name="email"]').siblings('.invalid-feedback').text(errors.email[0]);
                    }
                    if (errors.phone) {
                        form.find('input[name="phone"]').addClass('is-invalid');
                        form.find('input[name="phone"]').siblings('.invalid-feedback').text(errors.phone[0]);
                    }
                } else {
                    alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            }
        });
    });


    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
</script> --}}

{{-- <script type="text/javascript">
    function inIframe() {
        try {
        return window.self !== window.top;
        } catch (e) {
        return true;
        }
    }
</script>
<script type="text/javascript" src="https://salekit.io/6808964c794bda1d450b2d7e/lib_js/constant"></script>
<script src="https://apis.google.com/js/api.js"></script>
<script  type="text/javascript" src="https://salekit.page/assets/js/main_preview.js?v=89"></script>
<script type="text/javascript" src="https://salekit.page/assets/js/snowfall.js?v=89"></script>
<script  type="text/javascript" src="https://salekit.page/assets/js/animate_text.js?v=89"></script>
<script type="text/javascript" src="https://salekit.page/assets/builder/js_funel/submit_form.js?v=89"></script>
<script type="text/javascript" id="eventListener">
    if(document.querySelector("[id^=LIST]")){document.querySelectorAll("[id^=LIST]").forEach((item)=>{item.querySelector("style").remove();})}q("#SHAPE53").style.cursor = "pointer";a("#SHAPE53").forEach((item_SHAPE53)=>{
        item_SHAPE53.classList.add('event_scoll_action');
        item_SHAPE53.addEventListener('click',function(ev){
            q("#POPUP1").removeAttribute('style');document.body.classList.remove("open_modal");
        });});q("#TITLE133").style.cursor = "pointer";a("#TITLE133").forEach((item_TITLE133)=>{
        item_TITLE133.classList.add('event_scoll_action');
        item_TITLE133.addEventListener('click',function(ev){
            q("#SECTION3").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#TITLE134").style.cursor = "pointer";a("#TITLE134").forEach((item_TITLE134)=>{
        item_TITLE134.classList.add('event_scoll_action');
        item_TITLE134.addEventListener('click',function(ev){
            q("#SECTION4").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#TITLE135").style.cursor = "pointer";a("#TITLE135").forEach((item_TITLE135)=>{
        item_TITLE135.classList.add('event_scoll_action');
        item_TITLE135.addEventListener('click',function(ev){
            q("#SECTION6").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#TITLE136").style.cursor = "pointer";a("#TITLE136").forEach((item_TITLE136)=>{
        item_TITLE136.classList.add('event_scoll_action');
        item_TITLE136.addEventListener('click',function(ev){
            q("#SECTION7").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#BUTTON82").style.cursor = "pointer";a("#BUTTON82").forEach((item_BUTTON82)=>{
        item_BUTTON82.classList.add('event_scoll_action');
        item_BUTTON82.addEventListener('click',function(ev){
            q("#SECTION25").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#BUTTON83").style.cursor = "pointer";a("#BUTTON83").forEach((item_BUTTON83)=>{
        item_BUTTON83.classList.add('event_scoll_action');
        item_BUTTON83.addEventListener('click',function(ev){
            q("#SECTION25").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#BUTTON120").style.cursor = "pointer";a("#BUTTON120").forEach((item_BUTTON120)=>{
        item_BUTTON120.classList.add('event_scoll_action');
        item_BUTTON120.addEventListener('click',function(ev){
            
        });});q("#BUTTON91").style.cursor = "pointer";a("#BUTTON91").forEach((item_BUTTON91)=>{
        item_BUTTON91.classList.add('event_scoll_action');
        item_BUTTON91.addEventListener('click',function(ev){
            
        });});q("#BUTTON121").style.cursor = "pointer";a("#BUTTON121").forEach((item_BUTTON121)=>{
        item_BUTTON121.classList.add('event_scoll_action');
        item_BUTTON121.addEventListener('click',function(ev){
            
        });});q("#BUTTON95").style.cursor = "pointer";a("#BUTTON95").forEach((item_BUTTON95)=>{
        item_BUTTON95.classList.add('event_scoll_action');
        item_BUTTON95.addEventListener('click',function(ev){
            
        });});q("#BUTTON112").style.cursor = "pointer";a("#BUTTON112").forEach((item_BUTTON112)=>{
        item_BUTTON112.classList.add('event_scoll_action');
        item_BUTTON112.addEventListener('click',function(ev){
            
        });});q("#BUTTON116").style.cursor = "pointer";a("#BUTTON116").forEach((item_BUTTON116)=>{
        item_BUTTON116.classList.add('event_scoll_action');
        item_BUTTON116.addEventListener('click',function(ev){
            
        });});q("#BUTTON106").style.cursor = "pointer";a("#BUTTON106").forEach((item_BUTTON106)=>{
        item_BUTTON106.classList.add('event_scoll_action');
        item_BUTTON106.addEventListener('click',function(ev){
            
        });});q("#BUTTON93").style.cursor = "pointer";a("#BUTTON93").forEach((item_BUTTON93)=>{
        item_BUTTON93.classList.add('event_scoll_action');
        item_BUTTON93.addEventListener('click',function(ev){
            q("#SECTION25").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#BUTTON94").style.cursor = "pointer";a("#BUTTON94").forEach((item_BUTTON94)=>{
        item_BUTTON94.classList.add('event_scoll_action');
        item_BUTTON94.addEventListener('click',function(ev){
            q("#SECTION25").scrollIntoView({behavior: 'smooth'}, true);
        });});q("#BUTTON124").style.cursor = "pointer";a("#BUTTON124").forEach((item_BUTTON124)=>{
        item_BUTTON124.classList.add('event_scoll_action');
        item_BUTTON124.addEventListener('click',function(ev){
            
        });});q("#TITLE644").style.cursor = "pointer";a("#TITLE644").forEach((item_TITLE644)=>{
        item_TITLE644.classList.add('event_scoll_action');
        item_TITLE644.addEventListener('click',function(ev){
            
        });});q("#TITLE645").style.cursor = "pointer";a("#TITLE645").forEach((item_TITLE645)=>{
        item_TITLE645.classList.add('event_scoll_action');
        item_TITLE645.addEventListener('click',function(ev){
            
        });});q("#TITLE646").style.cursor = "pointer";a("#TITLE646").forEach((item_TITLE646)=>{
        item_TITLE646.classList.add('event_scoll_action');
        item_TITLE646.addEventListener('click',function(ev){
            
        });});q("#TITLE647").style.cursor = "pointer";a("#TITLE647").forEach((item_TITLE647)=>{
        item_TITLE647.classList.add('event_scoll_action');
        item_TITLE647.addEventListener('click',function(ev){
            
        });});q("#BUTTON122").style.cursor = "pointer";a("#BUTTON122").forEach((item_BUTTON122)=>{
        item_BUTTON122.classList.add('event_scoll_action');
        item_BUTTON122.addEventListener('click',function(ev){
            q("#SECTION25").scrollIntoView({behavior: 'smooth'}, true);
        });});
</script>
<script type="text/javascript" src="https://salekit.page/assets/js/youtube_preview.js"></script>
<script type="text/javascript">
    // ****** event resize window
    window.onresize = function() {
        let list_resize = JSON.parse('[]');
        for(let i of list_resize){
        if(i.type == 'background' && i.url){
            let id = i.url.split('?')[1].split('&')[0].split('=')[1];
            if(i.url.indexOf('shorts') > -1){
            id = i.url.split('/')[i.url.split('/').length-1];
            }
            api_youtube(i.id,id,i.parent_id);
        }
        }
    }
    window.onload = function() {
        let list_resize = JSON.parse('[]');
        for(let i of list_resize){
        if(i.type == 'background' && i.url){
            let id = i.url.split('?')[1].split('&')[0].split('=')[1];
            if(i.url.indexOf('shorts') > -1){
            id = i.url.split('/')[i.url.split('/').length-1];
            }
            api_youtube(i.id,id,i.parent_id);
        }
        }
    }
    let load_font_file = document.querySelector("#load_font_file").textContent;
    if(load_font_file && load_font_file.trim()){
        load_font_file = JSON.parse(load_font_file);
        for(let i of load_font_file){
        let name = i.split('/')[i.split('/').length-1].split('.')[0];
        document.querySelector("#font_file").innerHTML += `@font-face {
                            font-family: ${ name };
                            font-style: normal;
                            font-display: block;
                            src: url("${ i }") format("truetype");}`
        }
    }
</script>
<script type="text/javascript">
    let data_more_address = {};
    var data_send = { };
    document.querySelectorAll('[id^=FORM] form').forEach((item)=>{
    if(item.closest('[id^=FORM]').id.indexOf("_") == -1){
        item.addEventListener('submit',function(event) {
        event.preventDefault();
        submit_form_landingpage(item,item.querySelector("button"));
        })
    }
    
    })
    async function submit_form_landingpage(item,button) {
        // ******
    data_send = { };
    try{
        data_send['step_id'] = step_id;
    }catch(e){
    
    }
    if(item.querySelector(".g-recaptcha")){
        if(grecaptcha.getResponse() == ''){
        alert('Vui lòng xác nhận không phải robot');
        return false;
        }else{
        data_send['recaptchaResponse'] = grecaptcha.getResponse();
        data_send['keyCaptcha'] = item.querySelector(".g-recaptcha").getAttribute('data-sitekey');
        }
    }
    if(document.querySelector(".type_repatcha") && document.querySelector(".type_repatcha").getAttribute('data-value') == 'v3'){
    let token = await grecaptcha.execute(document.querySelector("#key_recaptcha").value, { action: 'submit' })
    data_send['recaptchaResponse'] = token;
        data_send['keyCaptcha'] = document.querySelector("#key_recaptcha").value;
    }
    item.querySelectorAll('input').forEach((item)=>{
        let name = item.getAttribute('name').toString();
        switch(item.getAttribute('type')){
        case 'radio':
            if(item.checked){
            data_send[name] = item.value;
            }
            break;
        case 'checkbox':
            if(!data_send[name]){
            data_send[name] =[];
            }
            if(item.checked){
            data_send[name].push(item.value);
            }
            break;
        default:
            if(item.value){
            data_send[name] = item.value.trim('');
            }else if(item.getAttribute('value')){
            data_send[name] = item.getAttribute('value').trim('');
            }
            break;
        }
    })
    item.querySelectorAll('select').forEach((item)=>{
        data_send[item.getAttribute('name')] = item.value.trim('');
    })
    item.querySelectorAll('textarea').forEach((item)=>{
        data_send[item.getAttribute('name')] = item.value.trim('');
    })
    let data_type = item.closest('[id^=FORM]').getAttribute('data-type');
    if( data_type &&  (data_type == 'login' || data_type == 'signup')){
        data_send['type'] = data_type;
        data_send['page'] = document.querySelector("#landingpage").value;
        $.ajax({
            url: '/api/v1/login',
            method: 'POST',
            data: data_send,
            success: function(data, textStatus, xhr){
            if(data.error){
                showPopupAlert(data.mess,item)
            }else{
                item.querySelectorAll('[id^=INPUT] input').forEach((item)=>{
                item.value = ''
                })
                item.querySelectorAll('select').forEach((item)=>{
                item.value = ''
                })
                item.querySelectorAll('textarea').forEach((item)=>{
                item.value = ''
                })
                if(item.closest('[id^=FORM]').querySelector(".data_thankyou").getAttribute('type')=='popup'){
                showPopupAlert(item.closest('[id^=FORM]').querySelector(".data_thankyou").textContent,item);
                }else{
                window.location.href = item.closest('[id^=FORM]').querySelector(".data_thankyou").textContent;
                }
                
            }
            }
        })
        return false;
    }
    
    
    let link = getParam('link_id',window.location.href);
    if(link){
        data_send['link_id'] = link;    
    }
    if(item.querySelectorAll(".province")){
        item.querySelectorAll(".province").forEach((item)=>{
        if(item.value.trim()!=''){
            let province = item.value;
            let district = item.parentNode.querySelector(".districts").value.trim();
            let ward = item.parentNode.querySelector(".wards").value.trim();
            let address = '';
    
            data_send['address'] = ward+' - '+district+' - '+ province;  
            if(step_id){
            data_more_address['province_id'] = item.querySelector('option[value="'+item.value+'"]').getAttribute('data-code');
            if(district){
                data_more_address['district_id'] = item.parentNode.querySelector('.districts option[value="'+district+'"]').getAttribute('data-code');  
            }
            if(ward){
                data_more_address['ward_id'] = item.parentNode.querySelector('.wards option[value="'+ward+'"]').getAttribute('data-code');  
            }
            }
        }
        })
    }
    
    let check = false;
    item.querySelectorAll('[data-require="true"]').forEach((item_require)=>{
    
        let name = item_require.getAttribute('name').toString();
        
        if(!item_require.classList.contains("province")
        && !item_require.classList.contains("districts")
        && !item_require.classList.contains("wards")
        ){
        item_require.removeAttribute('style');
        }
        let p = document.querySelector("#"+item_require.closest('[id]').id+' .error_data');
        if(p){
        p.remove();
        }
        if(!data_send[name] || data_send[name].length == 0){
        $(item_require.closest('[id]')).append('<p class="error_data" style="color:red;font-size:12px;font-size: 10px;padding: 1px 0px;">Không được để trống</p>');
        item_require.style.borderColor = 'red';
        check = true;
        }
        if(name == 'phone' && item_require.getAttribute('data-type')=='phone'){
        data_send[name] = data_send[name].trim().replace(/\s/g,'');
        if((data_send[name].length < 10 || data_send[name].length > 11)){
            $(item_require.closest('[id]')).append('<p class="error_data" style="color:red;font-size:12px;font-size: 10px;padding: 1px 0px;">Số điện thoại không đúng định dạng</p>');
        item_require.style.borderColor = 'red';
        check = true;
        }
        }
    })
    if(item.querySelector("[name='address']")){
        address = item.parentNode.querySelector("[name='address']").value.trim();
        data_send['address_detail'] = address;
        let check_province = item.parentNode.querySelector("[name='province']");
        if(check_province){
        data_send['address'] = (address?(address + ' - '):'')+data_send['address']  
        }
    }
    if(check){
        return false;
    }
    if(button.querySelector("span i")){
        button.querySelector("span i").remove();
    }
    button.querySelector("span").innerHTML = '<i class=" remove_submit fa fa-spinner fa-spin"></i>'+button.querySelector("span").innerHTML;
    data_send['link'] = window.location.href.replace('https://','').replace('http://','');
    if(item.getAttribute('data-type') != 'api_url'){
        data_send['form'] = item.parentNode.id;
    }
    localStorage.setItem('data_form',utf8_to_b64(JSON.stringify(data_send)));
    // ******
    // ******************** check not order
    if(item.parentNode.getAttribute('data-type') && item.parentNode.getAttribute('data-type') == 'order'){
        //data_send['not_save_lead'] = true;
    }
    
                    if(item.parentNode.id == 'FORM3'){
            data_send_DEFAULT = {...data_send};
            data_send_DEFAULT['form'] = "FORM3";
            data_send_DEFAULT['landingpage'] = q("input#landingpage").value;
            let url_default = '/api/v1/savedata';
            if(item.closest('[id^=FORM]').getAttribute('data-url')){
                url_default = item.closest('[id^=FORM]').getAttribute('data-url');
            }
            var DEFAULT = new Promise((resolve, reject) => {
            $.ajax({
                url: url_default,
                headers: {"Content-Type":"application/json"},
                method: 'POST',
                data: JSON.stringify(data_send_DEFAULT),
                success: function(data, textStatus, xhr){
                    resolve(data);
                }
            })
        });data_send_APICUSTOM = {...data_send};
            var APICUSTOM = new Promise((resolve, reject) => {
                                resolve(true);
                            });
            try{
                APICUSTOM = apiCustomForm(data_send_APICUSTOM,item)
            }catch(e){
                
            };Promise.all([DEFAULT,APICUSTOM]).then((values) => {
            if(values[0].customer){
                let data_form = JSON.parse(b64_to_utf8(localStorage.getItem('data_form')));
                data_form['customer_cid'] = values[0].customer;
                localStorage.setItem('data_form',utf8_to_b64(JSON.stringify(data_form)));
            }
            
            Promise.all([]).then((values) => {
                unload();
                if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'url'){
                    if(typeof data_send == 'string'){
                    data_send = JSON.parse(data_send);
                    }
                    let href = item.parentNode.querySelector('.data_thankyou').textContent; 
                    if(!item.parentNode.querySelector('.data_thankyou').getAttribute('redirect')){
                    for(let i in data_send){
                        let value = data_send[i];
                        if(typeof data_send[i] == 'object'){
                            value = data_send[i].join(',');
                        }
                        href = href.replace('{'+i+'}',value);
                        }
                    }
                    window.location.href = href;
                }else if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'tab_next'){
                    let id_tab = item.parentNode.querySelector('.data_thankyou').textContent;
                    if(q("#"+id_tab)){
                    q("#"+id_tab).addEventListener('click', addEventClickActiveTab);q("#"+id_tab).dispatchEvent(new Event('click'))
                    }
                }else if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'popup_2'){
                    let id_popup = item.parentNode.querySelector('.data_thankyou').textContent;
                        q("#"+id_popup).style.display = 'flex';
                        document.body.classList.add("open_modal");
                        
                        document.querySelectorAll("#"+id_popup+ " [id^=PARAGRAPH],#"+id_popup+" [id^=TITLE]").forEach((item)=>{
                            if(item.getAttribute("old_html")){
    
                                item.innerHTML = b64_to_utf8(item.getAttribute("old_html"))
                                console.log(item.innerHTML)
                                replaceText(item);	
                            }
                        })
                }else{
                    let group = document.createElement('div');
                    group.setAttribute('style','position: fixed;top: 0;left: 0;z-index: 9999999999;background: #0000003b;width: 100%;height: 100%;display: flex;')
                    let html = '<div style="				                      max-width: 300px;				                      background: #fff;				                      margin: auto;				                      border-radius: 5px;				                      position: relative;">				                      <div style="padding:20px;">'
                    html += item.parentNode.querySelector('.data_thankyou').textContent;       
                    html +='</div>				                      <button style="color: #3d3d3d;				                                display: inline-block;				                                padding: 8px 17px;				                                font-size: 16px;				                                border-radius: 5px;				                                cursor: pointer;				                                border: 1px solid var(--color-gray);				                                margin: 20px;				                                margin-top: 0;				                                float: right;">Đóng</button>				                      </div>';
                    group.innerHTML = html;
                    group.querySelector('button').addEventListener('click',function() {
    
                    group.remove();
                    if(item.closest('[id^=POPUP]')){
                        item.closest('[id^=POPUP]').removeAttribute('style');
                    }
    
                    })
                    group.addEventListener('click',function(event) {
                    if(event.target == group || event.target.closest(".close_modal")){
                        group.remove();
                    }
                    })
                    document.body.appendChild(group);
                }
            })
        });
        }
                if(item.parentNode.id == 'FORM5'){
            data_send_DEFAULT = {...data_send};
            data_send_DEFAULT['form'] = "FORM4";
            data_send_DEFAULT['landingpage'] = q("input#landingpage").value;
            let url_default = '/api/v1/savedata';
            if(q('#url_api').value && q('#url_api').value.indexOf('edubit.vn') == -1){
                url_default = q('#url_api').value+'/api/v1/savedata';
            }
            if(item.closest('[id^=FORM]').getAttribute('data-url')){
                url_default = item.closest('[id^=FORM]').getAttribute('data-url');
            }
            var DEFAULT = new Promise((resolve, reject) => {
            $.ajax({
                url: url_default,
                headers: {"Content-Type":"application/json"},
                method: 'POST',
                data: JSON.stringify(data_send_DEFAULT),
                success: function(data, textStatus, xhr){
                    resolve(data);
                }
            })
        });data_send_APICUSTOM = {...data_send};
            var APICUSTOM = new Promise((resolve, reject) => {
                                resolve(true);
                            });
            try{
                APICUSTOM = apiCustomForm(data_send_APICUSTOM,item)
            }catch(e){
                
            };Promise.all([DEFAULT,APICUSTOM]).then((values) => {
            if(values[0].customer){
                let data_form = JSON.parse(b64_to_utf8(localStorage.getItem('data_form')));
                data_form['customer_cid'] = values[0].customer;
                localStorage.setItem('data_form',utf8_to_b64(JSON.stringify(data_form)));
            }
            
            Promise.all([]).then((values) => {
                unload();
                if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'url'){
                    if(typeof data_send == 'string'){
                    data_send = JSON.parse(data_send);
                    }
                    let href = item.parentNode.querySelector('.data_thankyou').textContent; 
                    if(!item.parentNode.querySelector('.data_thankyou').getAttribute('redirect')){
                    for(let i in data_send){
                        let value = data_send[i];
                        if(typeof data_send[i] == 'object'){
                            value = data_send[i].join(',');
                        }
                        href = href.replace('{'+i+'}',value);
                        }
                    }
                    window.location.href = href;
                }else if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'tab_next'){
                    let id_tab = item.parentNode.querySelector('.data_thankyou').textContent;
                    if(q("#"+id_tab)){
                    q("#"+id_tab).addEventListener('click', addEventClickActiveTab);q("#"+id_tab).dispatchEvent(new Event('click'))
                    }
                }else if(item.parentNode.querySelector('.data_thankyou').getAttribute('type') == 'popup_2'){
                    let id_popup = item.parentNode.querySelector('.data_thankyou').textContent;
                        q("#"+id_popup).style.display = 'flex';
                        document.body.classList.add("open_modal");
                        
                        document.querySelectorAll("#"+id_popup+ " [id^=PARAGRAPH],#"+id_popup+" [id^=TITLE]").forEach((item)=>{
                            if(item.getAttribute("old_html")){
    
                                item.innerHTML = b64_to_utf8(item.getAttribute("old_html"))
                                replaceText(item);	
                            }
                        })
                }else{
                    let group = document.createElement('div');
                    group.setAttribute('style','position: fixed;top: 0;left: 0;z-index: 9999999999;background: #0000003b;width: 100%;height: 100%;display: flex;')
                    let html = '<div style="				                      max-width: 300px;				                      background: #fff;				                      margin: auto;				                      border-radius: 5px;				                      position: relative;">				                      <div style="padding:20px;">'
                    html += item.parentNode.querySelector('.data_thankyou').textContent;       
                    html +='</div>				                      <button style="color: #3d3d3d;				                                display: inline-block;				                                padding: 8px 17px;				                                font-size: 16px;				                                border-radius: 5px;				                                cursor: pointer;				                                border: 1px solid var(--color-gray);				                                margin: 20px;				                                margin-top: 0;				                                float: right;">Đóng</button>				                      </div>';
                    group.innerHTML = html;
                    group.querySelector('button').addEventListener('click',function() {
    
                    group.remove();
                    if(item.closest('[id^=POPUP]')){
                        item.closest('[id^=POPUP]').removeAttribute('style');
                    }
    
                    })
                    group.addEventListener('click',function(event) {
                    if(event.target == group || event.target.closest(".close_modal")){
                        group.remove();
                    }
                    })
                    document.body.appendChild(group);
                    if('' && window.innerWidth < 900){
                    let link_mobile = "undefined";
                    for(let i in data_send){
                        link_mobile = link_mobile.replace('{'+i+'}',data_send[i]);
                    }
                    window.open(link_mobile);
                    }
                }
            })
        });
        }
        
        
    }
</script>
<script type="text/javascript" src="https://salekit.page/assets/js/after_main.js?v=89"></script> --}}