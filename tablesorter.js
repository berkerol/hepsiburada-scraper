$(function () {
    $("table").tablesorter({
        theme: "bootstrap",
        sortReset: true,
        headerTemplate: '{content} {icon}',
        widgets: ["uitheme", "saveSort", "resizable", "filter", "mark"],
        widgetOptions: {
            filter_saveFilters: true
        }
    })
});
