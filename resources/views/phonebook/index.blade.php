<x-app-layout>
    <div class="container">
        <button class="btn btn-outline-primary new mb-1">Добавить новый номер</button>
        <div class="alert alert-danger d-none mt-2" role="alert">
        </div>
        <table class="table p-2 table-border table-hover">
            <thead>
                <th>Имя</th>
                <th>Номер телефона</th>
                <th>Добавил</th>
                <th>Операции</th>
            </thead>
            <tbody>
                @foreach ($phonebooks as $phone)
                    <tr>
                        <td>{{ $phone->name }}</td>
                        <td>{{ $phone->phone }}</td>
                        <td>{{ $phone->user->name }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary btn-sm edit" data-id="{{ $phone->id }}">
                                    Редактировать</button>
                                <button class="btn btn-outline-primary btn-sm delete" data-id="{{ $phone->id }}">
                                    Удалить</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(function() {
            $(".new").on("click", function() {
                $('#modalAjax').load('{{ route('phonebook.create') }}');
            });
            $(".edit").on("click", function() {
                let url = "{{ route('phonebook.edit', [':phonebook']) }}"
                $('#modalAjax').load(url.replace(':phonebook', $(this).data('id')));
            });
            $(".delete").on("click", function() {
                let url = "{{ route('phonebook.destroy', ['phonebook' => ':id']) }}";
                $.ajax({
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    url: url.replace(':id', $(this).data('id')),
                    success() {
                        document.location.reload();
                    },
                    error(data) {
                        $('.alert').empty().append(
                            'Произошла ошибка при удалении.'
                        );
                        $('.alert').removeClass('d-none');
                    }
                })
            });
        })
    </script>
</x-app-layout>
