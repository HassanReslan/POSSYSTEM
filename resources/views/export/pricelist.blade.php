<table width="100%">
        <thead>
        <tr style="background-color:blue;color:white;height;50px">
            <th width="100%">#</th>
            <th width="100%">Product Name</th>
            <th width="100%">Product Code</th>
            <th width="100%">Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pricelists as $key => $val)
            <tr>
                <td width="100%">{{ $key+1 }}</td>
                <td width="100%">{{ $val->product_name }}</td>
                <td width="100%">{{ $val->product_code }}</td>
                <td width="100%">{{ $val->sale_price }}$</td>
            </tr>
        @endforeach
        </tbody>
    </table>