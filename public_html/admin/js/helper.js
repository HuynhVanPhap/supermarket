function make_slug(str) {
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    var from = "{{ config('global.slug.from') }}";
    var to   = "{{ config('global.slug.to') }}";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    const slug = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
       .replace(/\s+/g, '-') // collapse whitespace and replace by -
       .replace(/-+/g, '-'); // collapse dashes

    return slug;
}
