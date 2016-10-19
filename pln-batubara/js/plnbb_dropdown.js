jQuery(document).ready(function($) {
    var $propinsi = $('#propinsi');
    var $kabupaten = $('#KabupatenKota');
    
    $propinsi.on('change',function(e){
        var prop_id=$propinsi.val();
        
        if(prop_id > 0){

            $.ajax({
                url:'kabupatenDropDownData/'+prop_id,
                type:'GET',
                success:function(data){
                    $kabupaten.empty();
                    $kabupaten.append("<option value='-1'>- Pilih Kabupaten / Kota -</option>");
                    $kabupaten.append(data);
                }, error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
            
        } else {
            $kabupaten.empty();
            $kabupaten.append("<option value='-1'>- Pilih Kabupaten / Kota -</option>");
        }   

    });
});