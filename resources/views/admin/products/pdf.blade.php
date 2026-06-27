<h1>Products Report</h1>
<table width="100%" border="1" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>Name</th>
      <th>Category</th>
      <th>Featured</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $p)
    <tr>
      <td>{{ $p->name }}</td>
      <td>{{ $p->category }}</td>
      <td>{{ $p->is_featured ? 'Yes' : 'No' }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
