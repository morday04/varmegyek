// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

$(document).ready(function(){

    // Manufacturer Change
    $('#select-manufacturer').change(function(){
        // Manufacturer id
        var id = $(this).val();

        // Empty the mpdel dropdown
        $('#select-type').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: '/manufacturers/'+id+'/types',
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }
                console.log(len);
                if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;
                        var option = "<option value='"+id+"'>"+name+"</option>";

                        $("#select-type").append(option);
                    }
                }
                // Changing logo
                len = 0;
                if(response['logo'] != null){
                    len = response['logo'].length;
                }
                if (len > 0) {
                    $("#logo").attr('src', response['logo']);
                }
                else {
                    $("#logo").attr('src', '');
                }
            }
        });
    });
});
