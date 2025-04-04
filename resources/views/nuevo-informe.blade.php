@extends('layouts.app')
@section('title', 'Nuevo Informe')

@section('content')
<div class="nuevo-main">
    <div class="nuevo-informe"><h1>NUEVO INFORME</h1></div>
    <form class="nuevo-form" action="{{ route('informe.fetch') }}" method="GET">
        <label for="cuit" class="label-cuit">Ingrese CUIT/CUIL</label>
        <input class="input-cuit" type="text" name="cuit" id="cuit" placeholder="CUIT/CUIL" required />
        <button class="button-cuit" type="submit">ENVIAR</button>
    </form>
    <div class="nuevo-legis"><p>Lorem ipsum dolor sit amet consectetur adipiscing elit, nisi cras platea malesuada vehicula. Sapien sem donec venenatis mollis feugiat ullamcorper, fusce nisl nullam eget vitae risus, integer rhoncus faucibus eleifend netus. Per nunc laoreet tincidunt ullamcorper habitasse odio morbi tellus vestibulum porttitor, gravida dictumst justo vel cursus mus nascetur turpis augue, fringilla faucibus sollicitudin vehicula lectus mauris ut luctus placerat.
        Per fusce tincidunt sollicitudin dictum neque ligula aenean fames sociosqu, cum rutrum consequat porttitor cursus sem id mi, erat litora volutpat augue molestie rhoncus porta montes. Eleifend dapibus himenaeos nunc risus primis quisque tincidunt lacinia hac, torquent orci odio lobortis sociosqu diam praesent lacus quis, magna gravida commodo volutpat mattis ante consequat velit. Vivamus natoque maecenas morbi ultrices cum lectus hendrerit magna, id elementum nulla eu eleifend donec vestibulum eget, venenatis semper auctor nam himenaeos vulputate praesent mauris, netus ridiculus habitasse interdum taciti sed aenean.
        Bibendum metus id porta accumsan maecenas molestie in nostra, dui mattis auctor sapien sem facilisis at, condimentum eleifend luctus vitae tortor varius nullam. Magnis egestas quam nisi curae sodales nibh sagittis, eu non integer convallis mauris auctor, est hac rhoncus taciti class augue. Quisque enim euismod phasellus fringilla sapien suscipit sed, dui luctus massa odio montes nullam natoque, facilisis platea quam auctor ultrices vehicula. Risus vel class senectus morbi leo per vehicula, nulla facilisi convallis at fames cum, habitasse euismod curabitur facilisis tortor nisi.
        Nisi pulvinar ornare libero inceptos curae imperdiet, enim vestibulum neque magnis mollis elementum, nibh aenean sociosqu hendrerit nascetur. Quisque eu himenaeos malesuada est rutrum mi auctor mattis neque curabitur imperdiet, mauris ligula taciti facilisis habitasse eros volutpat mollis torquent bibendum mus, nunc at venenatis nulla nostra ullamcorper tortor per a phasellus. Enim habitant velit felis platea molestie massa vehicula, sodales rhoncus dictumst curae iaculis euismod leo, placerat vitae venenatis bibendum scelerisque potenti. Fames congue curae taciti dapibus vehicula purus torquent sollicitudin ornare, tristique primis sed vestibulum quam class molestie porta volutpat aptent, montes natoque nulla mauris netus massa nec tortor.</p>
    </div>
</div>
@endsection


