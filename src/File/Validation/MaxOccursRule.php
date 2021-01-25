<?php

namespace WsdlToPhp\PackageGenerator\File\Validation;

/**
 * Class MaxOccursRule
 * @link https://www.w3.org/TR/2004/REC-xmlschema-1-20041028/structures.html#p-max_occurs
 * Validation Rule: Element Sequence Locally Valid (Particle)
 * For a sequence (possibly empty) of element information items to be locally ·valid· with respect to a particle the appropriate case among the following must be true:
 *  - 1 If the {term} is a wildcard, then all of the following must be true:
 *   - 1.1 The length of the sequence must be greater than or equal to the {min occurs}.
 *   - 1.2 If {max occurs} is a number, the length of the sequence must be less than or equal to the {max occurs}.
 *   - 1.3 Each element information item in the sequence must be ·valid· with respect to the wildcard as defined by Item Valid (Wildcard) (§3.10.4).
 *  - 2 If the {term} is an element declaration, then all of the following must be true:
 *   - 2.1 The length of the sequence must be greater than or equal to the {min occurs}.
 *   - 2.2 If {max occurs} is a number, the length of the sequence must be less than or equal to the {max occurs}.
 *   - 2.3 For each element information item in the sequence one of the following must be true:
 *    - 2.3.1 The element declaration is local (i.e. its {scope} must not be global), its {abstract} is false, the element information item's [namespace name] is identical to the element declaration's {target namespace} (where an ·absent· {target namespace} is taken to be identical to a [namespace name] with no value) and the element information item's [local name] matches the element declaration's {name}.
 *            In this case the element declaration is the ·context-determined declaration· for the element information item with respect to Schema-Validity Assessment (Element) (§3.3.4) and Assessment Outcome (Element) (§3.3.5).
 *    - 2.3.2 The element declaration is top-level (i.e. its {scope} is global), {abstract} is false, the element information item's [namespace name] is identical to the element declaration's {target namespace} (where an ·absent· {target namespace} is taken to be identical to a [namespace name] with no value) and the element information item's [local name] matches the element declaration's {name}.
 *            In this case the element declaration is the ·context-determined declaration· for the element information item with respect to Schema-Validity Assessment (Element) (§3.3.4) and Assessment Outcome (Element) (§3.3.5).
 *    - 2.3.3 The element declaration is top-level (i.e. its {scope} is global), its {disallowed substitutions} does not contain substitution, the [local ] and [namespace name] of the element information item resolve to an element declaration, as defined in QName resolution (Instance) (§3.15.4) -- [Definition:]  call this declaration the substituting declaration and the ·substituting declaration· together with the particle's element declaration's {disallowed substitutions} is validly substitutable for the particle's element declaration as defined in Substitution Group OK (Transitive) (§3.3.6).
 *            In this case the ·substituting declaration· is the ·context-determined declaration· for the element information item with respect to Schema-Validity Assessment (Element) (§3.3.4) and Assessment Outcome (Element) (§3.3.5).
 *  - 3 If the {term} is a model group, then all of the following must be true:
 *   - 3.1 There is a ·partition· of the sequence into n sub-sequences such that n is greater than or equal to {min occurs}.
 *   - 3.2 If {max occurs} is a number, n must be less than or equal to {max occurs}.
 *   - 3.3 Each sub-sequence in the ·partition· is ·valid· with respect to that model group as defined in Element Sequence Valid (§3.8.4).
 * Note: Clauses clause 1 and clause 2.3.3 do not interact: an element information item validatable by a declaration with a substitution group head in a different namespace is not validatable by a wildcard which accepts the head's namespace but not its own.
 */
class MaxOccursRule extends AbstractMinMaxRule
{

    /**
     * @return string
     */
    public function name()
    {
        return 'maxOccurs';
    }

    /**
     * @return string
     */
    public function symbol()
    {
        return self::SYMBOL_MAX_INCLUSIVE;
    }

    /**
     * If maxOccurs is 'unbounded', no need to check occurrences count
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function testConditions($parameterName, $value, $itemType = false)
    {
        $test = '';
        if ($this->getAttribute()->isArray() && ((is_scalar($value) && 'unbounded' !== $value) || (is_array($value) && !in_array('unbounded', $value)))) {
            if ($itemType) {
                $test = 'is_array($this->%1$s) && count($this->%1$s) %3$s %2$d';
                $symbol = self::SYMBOL_MAX_EXCLUSIVE;
            } else {
                $test = 'is_array($%4$s) && count($%4$s) %3$s %2$d';
                $symbol = $this->symbol();
            }
            $test = sprintf($test, $this->getAttribute()->getCleanName(), $value, $symbol, $parameterName);
        }
        return $test;
    }

    /**
     * @param string $parameterName
     * @param mixed $value
     * @param bool $itemType
     * @return string
     */
    final public function exceptionMessageOnTestFailure($parameterName, $value, $itemType = false)
    {
        if ($itemType) {
            $message = 'sprintf(\'You can\\\'t add anymore element to this property that already contains %%s elements, the number of elements contained by the property must be %1$s %2$s\', count($this->%4$s))';
        } else {
            $message = 'sprintf(\'Invalid count of %%s, the number of elements contained by the property must be %1$s %2$s\', count($%3$s))';
        }
        return sprintf($message, $this->comparisonString(), is_array($value) ? implode(',', array_unique($value)) : $value, $parameterName, $this->getAttribute()->getCleanName());
    }
}
