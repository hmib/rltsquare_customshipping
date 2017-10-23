# rltsquare_customshipping
Module adds a new flat price shipping method (Sea Freight) to the system along with modification of the checkout flow to have condition based shipping method availability.
For carts with items having package_size (attribute) values of oversized or hazmet only sea freight and store pickup are available and for all other carts the other two methods (FedEx and Air Freight) are also available.
This module adds a message to the checkout page for customers to see why they cannot use fedEx and Air Freight for their purchased items.