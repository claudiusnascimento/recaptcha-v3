<script src="https://www.google.com/recaptcha/api.js?render={!! config('recaptcha-v3.site_key') !!}"></script>

<script>

    var rSiteKey = "{!! config('recaptcha-v3.site_key') !!}";

    grecaptcha.ready(function() {
        
        var inputs = document.querySelectorAll('[name="recaptcha"]');

        inputs.forEach(function(element) {

            var action = element.getAttribute('data-action');

            grecaptcha.execute(rSiteKey, {action: action}).then(function(token) {
            
                if(token) {

                    element.value = token;
                }

            });

        });

        
  });
</script>