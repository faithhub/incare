$(document).on('change', '#job_category', function() {
    var job_category_id = $('#job_category').val();
    getSubCategory(job_category_id);
});

function getSubCategory(job_category_id) {
    // console.log(job_category_id)
    $.ajax({
        method: 'get',
        url: "/employer/get-sub-cat/" + job_category_id,
        dataType: "json",
    }).done(function(response) {
        console.log(response)
        let options = '';
        options += `<option value="${response.id}">${response.name}</option>`;
        $('#job_sub_category').html(options);

        // $.map(response.sub, function(value, index) {
        //     console.log(value.id)
        //     options += `<option value="${value.id}">${value.name}</option>`;
        //     $('#job_sub_category').html(options);
        // });
    });
}