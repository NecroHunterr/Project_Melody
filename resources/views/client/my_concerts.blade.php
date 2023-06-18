@extends('layout.app')

@section('title')
    Mis conciertos
@endsection


@section('content')

@if ( $count > 0 )
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-black">
        <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Numero reserva
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Nombre concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha concierto
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Fecha compra
                </th>

                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Cantidad entradas
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    Total pagado
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    medio de pago
                </th>
                <th scope="col" class="px-6 py-3 bg-orange-light">
                    <p class="text-center">
                        Descargar
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->concertsClient as $concert)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $concert -> reservation_number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert -> concertDate -> concert_name  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y', strtotime($concert->concertDate->date)) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d/m/Y', strtotime($concert-> purchase_date)) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $concert-> ticket_quantity }}
                    </td>
                    <td class="px-6 py-4">
                        {{
                            ($concert-> ticket_quantity)*($concert->concertDate->price)

                        }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $concert -> payment_method  }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="w-auto h-auto" href="{{ route('pdf.descargar', ['id' => $concert->ticket->id]) }}">
                            <p class="bg-yellow-medium-light rounded-full text-center text-black-dark font-semibold">
                                descargar detalle
                            </p>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@if ( $count == 0 )
<p class="bg-orange-medium-light text-white text-center p-4 rounded-full font-semibold">
    No hay entradas adquiridas por desplegar
</p>
@endif
@endsection
