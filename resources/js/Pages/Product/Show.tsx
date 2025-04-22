import { Product, VariationTypeOption } from "@/types";
import { useForm, usePage } from "@inertiajs/react";
import { useMemo, useState } from "react";

const Show = ({
    product,
    variationOptions,
}: {
    product: Product;
    variationOptions: number[];
}) => {
    console.log(product);

    const form = useForm<{
        option_ids: Record<string, number>;
        quantity: number;
        price: number | null;
    }>({
        option_ids: {},
        quantity: 1,
        price: null,
    });

    const { url } = usePage();
    const [selectedOptions, setSelectedOptions] = useState<
        Record<number, VariationTypeOption>
    >([]);

    const images = useMemo(() => {
        for (let typeId in selectedOptions) {
            const option = selectedOptions[typeId];

            if (option.images.length > 0) return option.images;
        }
        return product.images;
    }, [product, selectedOptions]);

    const computedProduct = useMemo(() => {
        const selectedOptionsIds = Object.values(selectedOptions)
            .map((op) => op.id)
            .sort();

        for (let variation of product.variations) {
            const optionIds = variation.variation_type_options_ids.sort();
            // if(arrayAreEqual(selectedOptionsIds,optionIds){
            //     return {
            //         price:variation.price,
            //         quantity:variation.quantity ===null ?Number.MAX_VALUE: variation.quantity
            //     }
            // })
        }
        return {
            price: product.price,
            quantity: product.quantity,
        };
    }, [product, selectedOptions]);

    return <div>me</div>;
};

export default Show;
