<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig */
class __TwigTemplate_3a7f0ce1d110d819fe5837fbfd83dd4ceb5522d524c9d2142f7381bf6d5eed49 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 49, "if" => 52];
        $filters = ["clean_class" => 83, "escape" => 101, "raw" => 112];
        $functions = ["create_attribute" => 49];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'raw'],
                ['create_attribute']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig"));

        // line 47
        echo "
";
        // line 49
        $context["label_attributes"] = ((($context["label_attributes"] ?? null)) ? (($context["label_attributes"] ?? null)) : ($this->env->getExtension('Drupal\Core\Template\TwigExtension')->createAttribute()));
        // line 51
        echo "
";
        // line 52
        if ((($context["type"] ?? null) == "checkbox")) {
            // line 53
            echo "  ";
            if ((($context["customtype"] ?? null) == "custom")) {
                // line 54
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-checkbox";
                // line 55
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 56
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 57
                echo "  ";
            } elseif ((($context["customtype"] ?? null) == "switch")) {
                // line 58
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-switch";
                // line 59
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 60
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 61
                echo "  ";
            } else {
                // line 62
                echo "    ";
                $context["wrapperclass"] = "form-check";
                // line 63
                echo "    ";
                $context["labelclass"] = "form-check-label";
                // line 64
                echo "    ";
                $context["inputclass"] = "form-check-input";
                // line 65
                echo "  ";
            }
        }
        // line 67
        echo "
";
        // line 68
        if ((($context["type"] ?? null) == "radio")) {
            // line 69
            echo "  ";
            if ((($context["customtype"] ?? null) == "custom")) {
                // line 70
                echo "    ";
                $context["wrapperclass"] = "custom-control custom-radio";
                // line 71
                echo "    ";
                $context["labelclass"] = "custom-control-label";
                // line 72
                echo "    ";
                $context["inputclass"] = "custom-control-input";
                // line 73
                echo "  ";
            } else {
                // line 74
                echo "    ";
                $context["wrapperclass"] = "form-check";
                // line 75
                echo "    ";
                $context["labelclass"] = "form-check-label";
                // line 76
                echo "    ";
                $context["inputclass"] = "form-check-input";
                // line 77
                echo "  ";
            }
        }
        // line 79
        echo "
";
        // line 81
        $context["classes"] = [0 => "js-form-item", 1 => ("js-form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 83
($context["type"] ?? null)))), 2 => ((twig_in_filter(        // line 84
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (\Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))) : (("form-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["type"] ?? null)))))), 3 => ((twig_in_filter(        // line 85
($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) ? (($context["wrapperclass"] ?? null)) : ("")), 4 => ("js-form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 86
($context["name"] ?? null)))), 5 => ("form-item-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 87
($context["name"] ?? null)))), 6 => ((!twig_in_filter(        // line 88
($context["title_display"] ?? null), [0 => "after", 1 => "before"])) ? ("form-no-label") : ("")), 7 => (((        // line 89
($context["disabled"] ?? null) == "disabled")) ? ("disabled") : ("")), 8 => ((        // line 90
($context["errors"] ?? null)) ? ("has-error") : (""))];
        // line 94
        $context["description_classes"] = [0 => "description", 1 => "text-muted", 2 => (((        // line 97
($context["description_display"] ?? null) == "invisible")) ? ("sr-only") : (""))];
        // line 100
        if (twig_in_filter(($context["type"] ?? null), [0 => "checkbox", 1 => "radio"])) {
            // line 101
            echo "  <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 102
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 103
                echo "      <span class=\"field-prefix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 105
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 106
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 107
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 110
            echo "    ";
            if ((($context["label_display"] ?? null) == "before")) {
                // line 111
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 112
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 115
            echo "    <input";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["input_attributes"] ?? null), "addClass", [0 => ($context["inputclass"] ?? null)], "method")), "html", null, true);
            echo ">
    ";
            // line 116
            if ((($context["label_display"] ?? null) == "after")) {
                // line 117
                echo "      <label ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["label_attributes"] ?? null), "addClass", [0 => ($context["labelclass"] ?? null)], "method"), "setAttribute", [0 => "for", 1 => $this->getAttribute(($context["input_attributes"] ?? null), "id", [])], "method")), "html", null, true);
                echo ">
        ";
                // line 118
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["input_title"] ?? null)));
                echo "
      </label>
    ";
            }
            // line 121
            echo "    ";
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 122
                echo "      <span class=\"field-suffix\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
    ";
            }
            // line 124
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 125
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 126
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 129
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 130
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 131
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 134
            echo "  </div>
";
        } else {
            // line 136
            echo "  <fieldset";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null), 1 => "form-group"], "method")), "html", null, true);
            echo ">
    ";
            // line 137
            if (twig_in_filter(($context["label_display"] ?? null), [0 => "before", 1 => "invisible"])) {
                // line 138
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 140
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 141
                echo "      <div class=\"input-group\">
    ";
            }
            // line 143
            echo "    ";
            if ( !twig_test_empty(($context["prefix"] ?? null))) {
                // line 144
                echo "      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">";
                // line 145
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["prefix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 148
            echo "    ";
            if (((($context["description_display"] ?? null) == "before") && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 149
                echo "      <div";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "attributes", [])), "html", null, true);
                echo ">
        ";
                // line 150
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 153
            echo "    ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
            echo "
    ";
            // line 154
            if ( !twig_test_empty(($context["suffix"] ?? null))) {
                // line 155
                echo "      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">";
                // line 156
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["suffix"] ?? null)), "html", null, true);
                echo "</span>
      </div>
    ";
            }
            // line 159
            echo "    ";
            if (( !twig_test_empty(($context["prefix"] ?? null)) ||  !twig_test_empty(($context["suffix"] ?? null)))) {
                // line 160
                echo "      </div>
    ";
            }
            // line 162
            echo "    ";
            if ((($context["label_display"] ?? null) == "after")) {
                // line 163
                echo "      ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
                echo "
    ";
            }
            // line 165
            echo "    ";
            if (($context["errors"] ?? null)) {
                // line 166
                echo "      <div class=\"invalid-feedback\">
        ";
                // line 167
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["errors"] ?? null)), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 170
            echo "    ";
            if ((twig_in_filter(($context["description_display"] ?? null), [0 => "after", 1 => "invisible"]) && $this->getAttribute(($context["description"] ?? null), "content", []))) {
                // line 171
                echo "      <small";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["description"] ?? null), "attributes", []), "addClass", [0 => ($context["description_classes"] ?? null)], "method")), "html", null, true);
                echo ">
        ";
                // line 172
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["description"] ?? null), "content", [])), "html", null, true);
                echo "
      </small>
    ";
            }
            // line 175
            echo "  </fieldset>
";
        }
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  361 => 175,  355 => 172,  350 => 171,  347 => 170,  341 => 167,  338 => 166,  335 => 165,  329 => 163,  326 => 162,  322 => 160,  319 => 159,  313 => 156,  310 => 155,  308 => 154,  303 => 153,  297 => 150,  292 => 149,  289 => 148,  283 => 145,  280 => 144,  277 => 143,  273 => 141,  270 => 140,  264 => 138,  262 => 137,  257 => 136,  253 => 134,  247 => 131,  242 => 130,  239 => 129,  233 => 126,  230 => 125,  227 => 124,  221 => 122,  218 => 121,  212 => 118,  207 => 117,  205 => 116,  200 => 115,  194 => 112,  189 => 111,  186 => 110,  180 => 107,  175 => 106,  172 => 105,  166 => 103,  164 => 102,  159 => 101,  157 => 100,  155 => 97,  154 => 94,  152 => 90,  151 => 89,  150 => 88,  149 => 87,  148 => 86,  147 => 85,  146 => 84,  145 => 83,  144 => 81,  141 => 79,  137 => 77,  134 => 76,  131 => 75,  128 => 74,  125 => 73,  122 => 72,  119 => 71,  116 => 70,  113 => 69,  111 => 68,  108 => 67,  104 => 65,  101 => 64,  98 => 63,  95 => 62,  92 => 61,  89 => 60,  86 => 59,  83 => 58,  80 => 57,  77 => 56,  74 => 55,  71 => 54,  68 => 53,  66 => 52,  63 => 51,  61 => 49,  58 => 47,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for a form element.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing element.
 * - errors: (optional) Any errors for this form element, may not be set.
 * - prefix: (optional) The form element prefix, may not be set.
 * - suffix: (optional) The form element suffix, may not be set.
 * - required: The required marker, or empty if the associated form element is
 *   not required.
 * - type: The type of the element.
 * - name: The name of the element.
 * - label: A rendered label element.
 * - label_display: Label display setting. It can have these values:
 *   - before: The label is output before the element. This is the default.
 *     The label includes the #title and the required marker, if #required.
 *   - after: The label is output after the element. For example, this is used
 *     for radio and checkbox #type elements. If the #title is empty but the
 *     field is #required, the label will contain only the required marker.
 *   - invisible: Labels are critical for screen readers to enable them to
 *     properly navigate through forms but can be visually distracting. This
 *     property hides the label for everyone except screen readers.
 *   - attribute: Set the title attribute on the element to create a tooltip but
 *     output no label element. This is supported only for checkboxes and radios
 *     in \\Drupal\\Core\\Render\\Element\\CompositeFormElementTrait::preRenderCompositeFormElement().
 *     It is used where a visual label is not needed, such as a table of
 *     checkboxes where the row and column provide the context. The tooltip will
 *     include the title and required marker.
 * - description: (optional) A list of description properties containing:
 *    - content: A description of the form element, may not be set.
 *    - attributes: (optional) A list of HTML attributes to apply to the
 *      description content wrapper. Will only be set when description is set.
 * - description_display: Description display setting. It can have these values:
 *   - before: The description is output before the element.
 *   - after: The description is output after the element. This is the default
 *     value.
 *   - invisible: The description is output after the element, hidden visually
 *     but available to screen readers.
 * - disabled: True if the element is disabled.
 * - title_display: Title display setting.
 *
 * @see template_preprocess_form_element()
 */
#}

{%
  set label_attributes = label_attributes ? label_attributes : create_attribute()
%}

{% if type == 'checkbox' %}
  {% if customtype == 'custom' %}
    {% set wrapperclass = \"custom-control custom-checkbox\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% elseif customtype == 'switch' %}
    {% set wrapperclass = \"custom-control custom-switch\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% else %}
    {% set wrapperclass = \"form-check\" %}
    {% set labelclass = \"form-check-label\" %}
    {% set inputclass = \"form-check-input\" %}
  {% endif %}
{% endif %}

{% if type == 'radio' %}
  {% if customtype == 'custom' %}
    {% set wrapperclass = \"custom-control custom-radio\" %}
    {% set labelclass = \"custom-control-label\" %}
    {% set inputclass = \"custom-control-input\" %}
  {% else %}
    {% set wrapperclass = \"form-check\" %}
    {% set labelclass = \"form-check-label\" %}
    {% set inputclass = \"form-check-input\" %}
  {% endif %}
{% endif %}

{%
  set classes = [
    'js-form-item',
    'js-form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? type|clean_class : 'form-type-' ~ type|clean_class,
    type in ['checkbox', 'radio'] ? wrapperclass,
    'js-form-item-' ~ name|clean_class,
    'form-item-' ~ name|clean_class,
    title_display not in ['after', 'before'] ? 'form-no-label',
    disabled == 'disabled' ? 'disabled',
    errors ? 'has-error',
  ]
%}
{%
  set description_classes = [
    'description',
\t  'text-muted',
    description_display == 'invisible' ? 'sr-only',
  ]
%}
{% if type in ['checkbox', 'radio'] %}
  <div{{ attributes.addClass(classes) }}>
    {% if prefix is not empty %}
      <span class=\"field-prefix\">{{ prefix }}</span>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {% if label_display == 'before' %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    <input{{ input_attributes.addClass(inputclass) }}>
    {% if label_display == 'after' %}
      <label {{ label_attributes.addClass(labelclass).setAttribute('for', input_attributes.id) }}>
        {{ input_title | raw }}
      </label>
    {% endif %}
    {% if suffix is not empty %}
      <span class=\"field-suffix\">{{ suffix }}</span>
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </div>
{% else %}
  <fieldset{{ attributes.addClass(classes, 'form-group') }}>
    {% if label_display in ['before', 'invisible'] %}
      {{ label }}
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      <div class=\"input-group\">
    {% endif %}
    {% if prefix is not empty %}
      <div class=\"input-group-prepend\">
        <span class=\"field-prefix input-group-text\">{{ prefix }}</span>
      </div>
    {% endif %}
    {% if description_display == 'before' and description.content %}
      <div{{ description.attributes }}>
        {{ description.content }}
      </div>
    {% endif %}
    {{ children }}
    {% if suffix is not empty %}
      <div class=\"input-group-append\">
        <span class=\"field-suffix input-group-text\">{{ suffix }}</span>
      </div>
    {% endif %}
    {% if (prefix is not empty) or (suffix is not empty) %}
      </div>
    {% endif %}
    {% if label_display == 'after' %}
      {{ label }}
    {% endif %}
    {% if errors %}
      <div class=\"invalid-feedback\">
        {{ errors }}
      </div>
    {% endif %}
    {% if description_display in ['after', 'invisible'] and description.content %}
      <small{{ description.attributes.addClass(description_classes) }}>
        {{ description.content }}
      </small>
    {% endif %}
  </fieldset>
{% endif %}
", "themes/contrib/bootstrap_barrio/templates/form/form-element.html.twig", "D:\\xampp\\htdocs\\drupal\\myFirstProject\\web\\themes\\contrib\\bootstrap_barrio\\templates\\form\\form-element.html.twig");
    }
}
