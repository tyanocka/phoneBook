<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавить новый номер</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form">
                    @csrf
                    <x-form></x-form>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary save"><span class="spinner-border spinner-border-sm"
                        role="status" aria-hidden="true"></span> Сохранить</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".modal").modal('show');
        var $loading = $('.spinner-border').hide();
        $(".save").on("click", function() {
            $loading.show();
            $.ajax({
                url: "{{ route('phonebook.store') }}",
                type: "POST",
                data: $('.form').serialize(),
                success() {
                    document.location.reload();
                    $('.spinner-border').hide();
                },
                error(data) {
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();
                    if (data.status == '422') {
                        $('.spinner-border').hide();
                        let json = data.responseJSON;
                        for (let field in json.errors) {
                            let elem = $('[name="' + field + '"]');

                            let feedbackBlock = $(
                                '<div class="invalid-feedback text-danger" id="' +
                                field + '"></div>')

                            $.each(json.errors[field], (key, value) => {
                                feedbackBlock.html(value + '<br>');
                            });

                            elem.parent().find('invalid-feedback').remove();
                            elem.attr('aria-describedby', field);
                            elem.after(feedbackBlock);
                            elem.addClass('is-invalid');
                        }
                    }
                }
            });
        });
    })
</script>
