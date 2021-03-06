/**
 * Created by david1 on 03/05/2017.
 */
var $ = jQuery;


/**
 * VUE.JS
 */
/**
 * Components
 */


Vue.component('modal-menu', {
    delimiters: ['<%', '%>'],
    template: '#modal-menu',
    props: ['showModalMenu','i18n','switchingLanguage'],
    computed : {
        switchingLanguage : function (value) {
            return this.$parent.switchingLanguage;
        },
        i18n : function () {
            return this.$parent.i18n;
        }


    },
    methods:{
        closeMenu:function () {
            this.$parent.showModalMenu = false;
        },
        goToLocation:function ($v) {
            this.$parent.goToLocation($v);
        },
        switchLang:function ($v) {
            this.$parent.switchLang($v);
        },
        languageSelectClass:function ($v) {
            return this.$parent.languageSelectClass($v);
        }
    },
    mounted:function () {
        $current = $(".lang-cell[data-i18n='" + demo.i18n + "']");
        $current.addClass('selected');
    }
});


/**
 * Configuration
 * @type {boolean}
 */
Vue.config.devtools = true;

/**
 * Application
 *  Build cart logic
 */
var webApp = new Vue({
    //router,
    el: '#vue-app',
    data: {
        activePage: '',
        allowedModalTemplates: [],
        host_origin: location.origin,
        i18n: 'en',
        isEmbeddedFormValid: false,
        isEmailValid: true,
        local_dev_hostname: "dm.dev",
        showModal: false,
        showModalMarketing: false,
        showModalMenu: false,
        showRedirectedResult: false,
        showLoading: false,
        showMobileMenu: false,
        showPopin: false,
        sidepopin: false,
        tpl: false

    },
    beforeCreate:function(){

    },
    watch: {
        emailClient:function (val) {
            this.setUsrEmail();
        }
    },
    methods: {
        checkFormValidity:function () {
            $this = this;
            validator = new FormValidator('embedded_form', [{
                name: 'firstname',
                display: 'required',
                rules: 'required'
            }, {
                name: 'lastname',
                display: 'required',
                rules: 'required'
            }, {
                name: 'email',
                rules: 'valid_email',
                depends: function() {
                    return Math.random() > .5;
                }
            }
            ], function(errors, event) {
                if (errors.length > 0) {
                    // Show the errors
                    console.warn(errors);
                    $this.isEmbeddedFormValid = false;
                    return false;
                } else {
                    console.log('form is ok');
                    $this.isEmbeddedFormValid = true;
                    return true;

                }
            });


        },
        closeDialog:function($id){
            this.showModal = false;
            this.showModalMenu = false;
            this.showModalMarketing = false;
            this.showresult = false;
        },
        closeModalImg:function (e) {
            $(e.srcElement).parent().toggleClass('is-active');
            this.showModal = !this.showModal;
        },
        createGuid: function() {
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                    .toString(16)
                    .substring(1);
            }
            return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                s4() + '-' + s4() + s4() + s4();
        },
        debounce: function (func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        },
        fetchData: function () {
            $this = this;
            //console.info($this.productsUri);
            jqxhr = $.ajax({
                method: "POST",
                url: $this.productsUri
            }).done(function(data) {
                $this.products = data.products;
                $this.cardPreFilled = data.card;

            }).fail(function(jqXHR, textStatus) {
                console.warn( jqXHR );
                console.warn( textStatus );
            }).always(function() {
                //alert( "complete" );
            });
        },
        getUsrEmail:function(){
            if (typeof(Storage) !== "undefined") {
                $usr = sessionStorage.getItem("usripn");
                return $usr;
            }
            return false;
        },
        goToPage:function($page,$dialogId){
            this.showModal = false;
            if($page === 'checkout' && this.activePage === 'shop'){
                this.appClass = $page;
                $base = this.root_uri;
                $sub = this.host_origin + '/'+ this.site_subdirectory;
                $this = this;
                if(this.template === 'iframe-layout'){
                    this.getIframeCart();
                } else{
                    //init rest API as the form is now visible
                    if(this.krIsReady === true){
                        KR_RESET();
                    }
                    this.krArgs.paymentMethodOptions.register = true;
                    this.krArgs.paymentMethodOptions.manualValidation = 'YES';
                    this.getFormToken();
                }



                this.activePage = $page;

            } else if (this.activePage === 'checkout'){
                this.appClass = 'shop';
                this.activePage = 'shop';
            }

        },
        goToLocation:function($value) {
            document.location.href = $value;
        },
        highlightCode:function(){
            console.log('high');
            $('pre code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        },
        isEmail:function() {
            //console.log('test email');
            regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            this.isEmailValid = regex.test(this.emailClient);
            return regex.test(this.emailClient);
        },
        modalImg:function (e) {
            $(e.srcElement).prev().toggleClass('is-active');
            this.showModal = !this.showModal;
        },
        openMenu:function () {
            this.showModalMenu = true;
        },
        scrollToDiv: function($div){
            $('html,body').animate({scrollTop: $div.offset().top}, 500);
        },
        getModal:function($event){

        }
    },
    computed: {
        root:function(){
            rootUri = this.host_origin + '/'+ this.site_subdirectory ;
            return rootUri;
        }
    },
    components: {

    },
    created: function () {
        //ga('set', 'userId', this.getUsrId);

    },
    mounted: function () {

    },
    ready: function() {


    }

});
