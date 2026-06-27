<h1>Articles Report</h1>
<table width="100%" border="1" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Published</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $a)
    <tr>
      <td>{{ $a->title }}</td>
      <td>{{ $a->author }}</td>
      <td>{{ $a->is_published ? 'Yes' : 'No' }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
