<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    ajaxCall = (method, url, formData = {}, headerData = {}) => {
        // If method is GET and formData is not empty then make query string URL
        if(method.toUpperCase() == 'GET' && !$.isEmptyObject(formData)){
            url += getQueryParam(formData);
        }
        // Request AJAX
        var response = $.ajax({
            url: url,
            type: method,
            headers: headerData,
            data: getFormData(formData),
            processData: false,
            contentType: false,
            async: false,
            dataType: "json",
            success: function(result) {
                return result;
            },
            error: function(jqXHR, textStatus) {
                return jqXHR;
            }
        });
        // Return final response
        return response;
    }
    // Make query string params with prefix
    getQueryParam = (item) => {
        return '?' + $.param(item);
    }
    // Make form object
    getFormData = (item) => {
        var formData = new FormData();
        for (var key in item) {
            formData.append(key, item[key]);
        }
        return formData;
    }
</script>
