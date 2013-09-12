# How to play with!

---------------

## Attributes

```javascript
var uploader = new Uploader({
    trigger: '#upload-icon',
    name: 'image',
    action: '/upload',
    accept: 'image/*',
    data: {'xsrf': 'hash'},
    multiple: true,
    error: function(file) {
        alert(file);
    },
    success: function(response) {
        alert(response);
    }
});
```

### trigger `element|selector`

a valid jQuery selector.

### name `string`

a name in`<input name="{{name}}">` , which is File upload parameter name post to server side.

### action `url`

a action destination in `<form action="{{action}}">`

### accept `string` _[optional]_

file input accept attribute，`image/\*`

### multiple `boolean`

Whether to support multiple file uploads. The default is false。

### data `object`

To be submitted along with the form data.

### error `function`

Upload failed callback function.

### success `function`

Upload a successful callback function.


## Methods

Chain style:

```javascript
var uploader = new Uploader({
    trigger: '#upload-icon',
    name: 'image',
    action: '/upload',
    data: {'xsrf': 'hash'}
}).success(function(response) {
    alert(response);
}).error(function(file) {
    alert(file);
});
```

## Data API

```html
<a id="upload" data-name="image" data-action="/upload" data-data="a=a&b=b">Upload</a>
<script>
var uploader = new Uploader({'trigger': '#upload'});
// more friendly way
// var uploader = new Uploader('#upload');
uploader.success(function(response) {
    alert(response);
});
</script>
```

## Advanced

Demo in **API** section could not be controlled. When you select a file, it will
be submitted immediately. We can broke the chain with ``change``:

```javascript
var uploader = new Uploader({
    trigger: '#upload-icon',
    name: 'image',
    action: '/upload',
    data: {'xsrf': 'hash'}
}).change(function(filename) {
    alert('you are selecting ' + filename);
    // Default behavior of change is
    // this.submit();
}).success(function(response) {
    alert(response);
});
```

Now you should handle it yourself:

```javascript
$('#submit').click(function() {
    uploader.submit();
});
```


## Show Progress

It is impossible to show progress, but you can make a fake prgress.


```javascript
var uploader = new Uploader({
    trigger: '#upload-icon',
    name: 'image',
    action: '/upload',
    data: {'xsrf': 'hash'}
}).change(function(filename) {
    // before submit
    $('#progress').text('Uploading ...');
    this.submit();
}).success(function(response) {
    $('#progress').text('Success');
    alert(response);
});
```


## Seajs Hint

Load uploader with seajs:

```javascript
seajs.use('upload', function(Uploader) {
    var uploader = new Uploader({
    });
});
```

## Changelog

**2013-07-18** `1.0.1`

1. Support choosing the same file for uploader
2. Fix memory leaks for FormData

**2013-06-25** `1.0.0`

Combine iframe and html5 uploader.