// Updated dataset with more aesthetic colors and distinct labels
var swirlData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "Sales",
            fillColor: "rgba(92, 207, 208, 0.3)", // Soft teal
            strokeColor: "rgba(92, 207, 208, 1)", // Strong teal
            pointColor: "rgba(92, 207, 208, 1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(92, 207, 208, 1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "Marketing",
            fillColor: "rgba(255, 85, 142, 0.3)", // Soft pink
            strokeColor: "rgba(255, 85, 142, 1)", // Strong pink
            pointColor: "rgba(255, 85, 142, 1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(255, 85, 142, 1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};

// Doughnut chart data with updated colors and labels
var doughnutData = [
    {
        value: 300,
        color:"#FF9F40", // Vibrant orange
        highlight: "#FFB37A",
        label: "Orange"
    },
    {
        value: 50,
        color: "#67B7E4", // Soft blue
        highlight: "#84C8F6",
        label: "Sky Blue"
    },
    {
        value: 100,
        color: "#FEC48A", // Warm gold
        highlight: "#FFD39D",
        label: "Gold"
    }
];

// Radar chart with updated colors and labels
var radarData = {
    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
    datasets: [
        {
            label: "Personal Well-being",
            fillColor: "rgba(92, 207, 208, 0.3)", // Soft teal
            strokeColor: "rgba(92, 207, 208, 1)", // Strong teal
            pointColor: "rgba(92, 207, 208, 1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(92, 207, 208, 1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            label: "Work & Activities",
            fillColor: "rgba(255, 85, 142, 0.3)", // Soft pink
            strokeColor: "rgba(255, 85, 142, 1)", // Strong pink
            pointColor: "rgba(255, 85, 142, 1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(255, 85, 142, 1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
    ]
};

// Polar chart with updated colors and labels
var polarData = [
    {
        value: 300,
        color:"#FF9F40", // Vibrant orange
        highlight: "#FFB37A",
        label: "Orange"
    },
    {
        value: 50,
        color: "#67B7E4", // Soft blue
        highlight: "#84C8F6",
        label: "Sky Blue"
    },
    {
        value: 100,
        color: "#FEC48A", // Warm gold
        highlight: "#FFD39D",
        label: "Gold"
    },
    {
        value: 40,
        color: "#A9A9A9", // Grey
        highlight: "#BEBEBE",
        label: "Grey"
    },
    {
        value: 120,
        color: "#4D5360", // Dark grey
        highlight: "#616774",
        label: "Dark Grey"
    }
];

// Bar chart with updated colors and labels
var barChartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "Product Sales",
            fillColor: "rgba(92, 207, 208, 0.5)", // Soft teal
            strokeColor: "rgba(92, 207, 208, 0.8)", // Strong teal
            highlightFill: "rgba(92, 207, 208, 0.75)",
            highlightStroke: "rgba(92, 207, 208, 1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label: "Marketing Spend",
            fillColor: "rgba(255, 85, 142, 0.5)", // Soft pink
            strokeColor: "rgba(255, 85, 142, 0.8)", // Strong pink
            highlightFill: "rgba(255, 85, 142, 0.75)",
            highlightStroke: "rgba(255, 85, 142, 1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};
