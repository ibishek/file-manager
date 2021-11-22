module.exports = {
    'env': {
        'browser': true,
        'es2021': true
    },
    'extends': 'eslint:recommended',
    'parserOptions': {
        'ecmaVersion': 13,
        'sourceType': 'module'
    },
    'plugins': [
        'svelte'
    ],
    'overrides': [
        {
            'files': ['*.svelte'],
            'processor': 'svelte3/svelte3'
        }
    ],
    'rules': {
        'indent': [
            'error',
            4
        ],
        'linebreak-style': [
            'error',
            'unix'
        ],
        'quotes': [
            'error',
            'single'
        ],
        'semi': [
            'error',
            'always'
        ]
    },
    'eslintIgnore': [
        'webpack.mix.js',
        'tailwind.config.js'
    ]
};
