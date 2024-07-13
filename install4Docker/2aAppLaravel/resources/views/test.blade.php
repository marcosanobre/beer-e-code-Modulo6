<x-app-layout>
    <x-slot name="header">
        <h3>HEADER</h3>
    </x-slot>
    <ol>
        <li>Nome: {{ $name }}</li>
        <li>Documento: {{ $document }}</li>
        <li>Status da assinatura: {{ $status }}</li>
        <li>Parametros GET na url: {{ $params }} </li>
    </ol>

</x-app-layout>