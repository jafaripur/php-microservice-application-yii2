<?php 

$finder = PhpCsFixer\Finder::create()
    ->exclude([
        'vendor',
        '.git',
        'docker',
        'runtime',
    ])
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

$config->setRules([
    '@PSR12' => true,
    '@PHP81Migration' => true,
    'array_indentation' => true,
    'array_syntax' => ['syntax' => 'short'],
    'binary_operator_spaces' => true,
    'class_attributes_separation' => true,
    'cast_spaces' => ['space' => 'none'],
    'concat_space' => ['spacing' => 'one'],
    'fully_qualified_strict_types' => true,
    'function_typehint_space' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,
    'no_binary_string' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => true,
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_spaces_around_offset' => true,
    'no_superfluous_phpdoc_tags' => ['allow_mixed' => true, 'allow_unused_params' => true],
    'no_trailing_comma_in_singleline_array' => true,
    'no_trailing_comma_in_singleline_function_call' => true,
    'no_unneeded_control_parentheses' => ['statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield', 'yield_from']],
    'no_unneeded_curly_braces' => true,
    'no_unused_imports' => true,
    'object_operator_without_whitespace' => true,
    'phpdoc_align' => true,
    'phpdoc_annotation_without_dot' => true,
    'phpdoc_indent' => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_return_self_reference' => true,
    'phpdoc_scalar' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types' => true,
    'no_short_bool_cast' => true,
    'increment_style' => true,
    'lambda_not_used_import' => true,
    'integer_literal_case' => true,
    'align_multiline_comment' => true,
    'blank_line_before_statement' => ['statements' => ['break', 'case', 'continue', 'declare', 'default', 'exit', 'goto', 'include', 'include_once', 'phpdoc', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'yield']],
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'explicit_indirect_variable' => true,
    'explicit_string_variable' => true,
    'multiline_comment_opening_closing' => true,
    'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
    'no_extra_blank_lines' => ['tokens' => ['break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
    'no_null_property_initialization' => true,
    'no_superfluous_elseif' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'operator_linebreak' => ['only_booleans' => true],
    'ordered_class_elements' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_order' => true,
    'phpdoc_types_order' => true,
    'phpdoc_var_without_name' => true,
    'single_line_comment_spacing' => true,
    'phpdoc_var_annotation_correct_order' => true,
    'return_assignment' => true,
    'simple_to_complex_string_variable' => true,
    'single_line_comment_style' => true,
    'single_line_throw' => true,
    'single_quote' => true,
    'single_space_after_construct' => true,
    'space_after_semicolon' => true,
    'standardize_increment' => true,
    'standardize_not_equals' => true,
    'switch_continue_to_break' => true,
    'types_spaces' => true,
    'unary_operator_spaces' => true,
    'whitespace_after_comma_in_array' => true,
    'yoda_style' => true,
    ])
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__.'/.php-cs-fixer.cache')
    ->setFinder($finder);

return $config;